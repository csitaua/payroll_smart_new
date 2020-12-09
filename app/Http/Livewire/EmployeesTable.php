<?php

namespace App\Http\Livewire;
use App\Models\Business;
use App\Models\Employee;
use Livewire\WithPagination;
use Livewire\Component;

class EmployeesTable extends Component
{
  use WithPagination;
  public $employee_id, $first_name, $last_name, $date_of_birth, $id_number, $tax_id_number, $married, $tax_group, $payment_period, $number_of_childrens,
  $work_type,$number_of_work_days, $email, $hire_date, $termination_date, $termination_reason;
  public $isOpen = 0;
  public $search = '';
  public $per_page = 10;
  public $sort_field = 'id';
  public $sort_asc = true;
  public $active_only = false;

  public function sortBy($field){
    if($field === $this->sort_field){
      $this->sort_asc =! $this->sort_asc;
    }
    else{
      $this->sort_asc=true;
    }

    $this->sort_field = $field;
  }

  public function openModal()
  {
      $this->isOpen = true;
  }

  public function closeModal()
  {
      $this->isOpen = false;
  }

  public function create()
  {
      $this->resetInputFields();
      $this->openModal();
  }

  private function resetInputFields(){
      $this->last_name = '';
      $this->first_name = '';
      $this->employee_id = '';
      $this->date_of_birth = '';
      $this->id_number='';
      $this->tax_id_number='';
      $this->married='';
      $this->tax_group='';
      $this->payment_period='';
      $this->number_of_childrens='';
      $this->work_type='';
      $this->number_of_work_days='';
      $this->email='';
      $this->hire_date='';
  }

  public function clear(){
    $this->search = '';
  }

    public function render()
    {
      $business = Business::where('id',auth()->user()->business_user->business_id)->first();
      $employees = Employee::where('business_id',$business->id)
                    ->Where(function ($query){
                    $query->where('first_name', 'like', '%'.$this->search.'%')
                          ->orwhere('last_name', 'like', '%'.$this->search.'%');
                  })
                  ->whereraw($this->active_only ? 'termination_date IS NULL' : '1')
                  ->orderBy($this->sort_field, $this->sort_asc ? 'asc' : 'desc')
                  ->paginate($this->per_page);
      return view('sections.payroll.employees-table',['user' => auth()->user(), 'business' => $business, 'employees' => $employees]);
    }

    public function store()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email',

        ]);

        if($this->employee_id){
          $employee = Employee::where('id', $this->employee_id)
            ->update(['first_name' => $this->first_name, 'last_name' => $this->last_name, 'date_of_birth' => \Carbon\Carbon::parse($this->date_of_birth)->format('Y-m-d'),
            'id_number' => $this->id_number, 'email' => $this->email, 'hire_date' => \Carbon\Carbon::parse($this->hire_date)->format('Y-m-d'),] );
        }
        else{

        }


        session()->flash('message',
            $this->employee_id ? 'Employee Updated Successfully.' : 'Employee Created Successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
       $employee = Employee::findOrFail($id);
       $this->employee_id = $id;
       $this->first_name = $employee->first_name;
       $this->last_name = $employee->last_name;
       $this->date_of_birth = $employee->date_of_birth;
       $this->email = $employee->email;
       $this->id_number = $employee->id_number;
       $this->hire_date = $employee->hire_date;

       $this->openModal();
   }
}
