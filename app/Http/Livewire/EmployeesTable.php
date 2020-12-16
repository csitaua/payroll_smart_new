<?php

namespace App\Http\Livewire;
use App\Models\Business;
use App\Models\Employee;
use App\Models\Country;
use Livewire\WithPagination;
use Livewire\Component;

class EmployeesTable extends Component
{
  use WithPagination;
  public $employee_id, $first_name, $last_name, $id_number, $tax_id_number, $married, $tax_group, $payment_period, $number_of_childrens,
  $work_type,$number_of_work_days, $email, $termination_date, $termination_reason,$date_of_birth,$hire_date, $gender,$country_of_birth, $mobile_number, $phone_number,
  $mobile_pre_country_id, $phone_pre_country_id;
  public $isOpen = 0;
  public $isTerminate = 0;
  public $search = '';
  public $per_page = 10;
  public $sort_field = 'id';
  public $sort_asc = true;
  public $active_only = true;
  public $warningMessage = '';




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
    $this->resetErrorBag();
    $this->resetValidation();
    $this->isOpen = false;
    $this->isTerminate = false;
    $this->warningMessage = '';
  }

  public function terminateEmployee(){
      $this->warningMessage='Terminating Employee';
      $this->isTerminate = true;
  }

  public function create()
  {
      $this->resetInputFields();
      $this->isTerminate=false;
      $this->termination_date=NULL;
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
      $this->gender='';
      $this->termination_date = '';
      $this->termination_reason = '';
      $this->warning_message = '';
      $this->country_of_birth = '';
      $this->mobile_number = '';
      $this->phone_number = '';
      $this->mobile_pre_country_id = '';
      $this->phone_pre_country_id = '';
  }

  public function clear(){
    $this->search = '';
  }

    public function render()
    {
      $business = Business::where('id',auth()->user()->current_business_id)->first();
      $employees = Employee::where('business_id',$business->id)
                    ->Where(function ($query){
                    $query->where('first_name', 'like', '%'.$this->search.'%')
                          ->orwhere('last_name', 'like', '%'.$this->search.'%');
                  })
                  ->whereraw($this->active_only ? 'termination_date IS NULL' : '1')
                  ->orderBy($this->sort_field, $this->sort_asc ? 'asc' : 'desc')
                  ->paginate($this->per_page);
      $countries = Country::all();
      return view('sections.payroll.employees-table',['user' => auth()->user(), 'business' => $business, 'employees' => $employees, 'countries' => $countries]);
    }

    public function store()
    {
        $this->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'email',

        ]);

        $user = auth()->user();
        if($this->employee_id){
          $employee= Employee::findOrFail($this->employee_id);
          $employee->update(['date_of_birth' => $this->date_of_birth, 'hire_date' => $this->hire_date, 'first_name' => $this->first_name, 'last_name' => $this->last_name, 'email' => $this->email,
                              'id_number' => $this->id_number, 'gender' => $this->gender, 'tax_id_number' => $this->tax_id_number, 'married' => $this->married,
                              'country_of_birth' => $this->country_of_birth, 'mobile_number' => $this->mobile_number, 'phone_number' => $this->phone_number,
                              'mobile_pre_country_id' => $this->mobile_pre_country_id, 'phone_pre_country_id' => $this->phone_pre_country_id]);
          if($this->isTerminate){
            $employee->update(['termination_date' => $this->termination_date, 'termination_reason' => $this->termination_reason]);
          }

        }
        else{
          Employee::create(['date_of_birth' => $this->date_of_birth, 'hire_date' => $this->hire_date, 'first_name' => $this->first_name, 'last_name' => $this->last_name, 'email' => $this->email,
                              'id_number' => $this->id_number, 'gender' => $this->gender, 'tax_id_number' => $this->tax_id_number, 'married' => $this->married,
                              'business_id' => auth()->user()->current_business_id, 'country_of_birth' => $this->country_of_birth, 'mobile_number' => $this->mobile_number,
                              'phone_number' => $this->phone_number, 'mobile_pre_country_id' => $this->mobile_pre_country_id, 'phone_pre_country_id' => $this->phone_pre_country_id]);
        }


        session()->flash('message',
            $this->employee_id ? 'Employee Updated Successfully.' : 'Employee Created Successfully.');

        $this->closeModal();
        //dd(\Carbon\Carbon::parse($this->date_of_birth)->isoFormat('Y-MM-DD'));
        $this->resetInputFields();
    }

    public function edit($id)
    {
       $employee = Employee::findOrFail($id);
       $user = auth()->user();
       $this->employee_id = $id;
       $this->first_name = $employee->first_name;
       $this->last_name = $employee->last_name;
       $this->date_of_birth = $employee->date_of_birth;
       $this->email = $employee->email;
       $this->id_number = $employee->id_number;
       $this->hire_date = $employee->hire_date;
       $this->gender = $employee->gender;
       $this->tax_id_number = $employee->tax_id_number;
       $this->married = $employee->married;
       $this->termination_date = $employee->termination_date;
       $this->termination_reason = $employee->termination_reason;
       $this->country_of_birth = $employee->country_of_birth;
       $this->mobile_number = $employee->mobile_number;
       $this->phone_number = $employee->phone_number;
       $this->mobile_pre_country_id = $employee->mobile_pre_country_id;
       $this->phone_pre_country_id = $employee->phone_pre_country_id;
       if($employee->termination_date !== NULL){
         $this->warningMessage='Terminated Employee';
       }
       $this->openModal();
   }

}
