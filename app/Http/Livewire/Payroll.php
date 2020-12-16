<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Business;
use App\Models\Employee;
use Illuminate\Http\Request;

class Payroll extends Component
{
    public $employee_id, $first_name, $last_name, $date_of_birth, $id_number, $tax_id_number, $married, $tax_group, $payment_period, $number_of_childrens,
    $work_type,$number_of_work_days, $email, $hire_date, $termination_date, $termination_reason;
    public $isOpen = 0;

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

    public function render()
    {

      $business = Business::where('id',auth()->user()->current_business_id)->first();
      $employees = Employee::where('business_id',$business->id);
      return view('sections.payroll.payroll', ['user' => auth()->user(), 'business' => $business, 'employees' => $employees]);
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
