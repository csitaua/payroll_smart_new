<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'id_number', 'tax_id_number', 'married', 'tax_group', 'payment_period', 'number_of_childrens', 'work_type',
        'number_of_work_days', 'email', 'termination_date', 'termination_reason','date_of_birth', 'hire_date', 'gender', 'business_id', 'country_of_birth',
        'mobile_number', 'phone_number', 'mobile_pre_country_id', 'phone_pre_country_id',
    ];

    //Date of Birth to handle locale settings
    protected function getDateOfBirthAttribute($value)
    {
        $user = auth()->user();
        $carbon = parent::asDateTime($value);
        return $carbon->locale("$user->locale")->isoFormat('L');

    }
    //Date of Birth to handle locale settings
    protected function setDateOfBirthAttribute($value)
    {
        $user = auth()->user();
        $this->attributes['date_of_birth'] = \Carbon\Carbon::createFromIsoFormat('L', $value, null, $user->locale)->isoFormat('Y-MM-DD');
    }

    //***********
    //Hire Date to handle locale settings
    protected function getHireDateAttribute($value)
    {
        $user = auth()->user();
        $carbon = parent::asDateTime($value);
        return $carbon->locale("$user->locale")->isoFormat('L');
    }

    //Hire Date to handle locale settings
    protected function setHireDateAttribute($value)
    {
        $user = auth()->user();
        $this->attributes['hire_date'] = \Carbon\Carbon::createFromIsoFormat('L', $value, null, $user->locale)->isoFormat('Y-MM-DD');
    }

    //***********
    //Termination Date to handle locale settings
    protected function getTerminationDateAttribute($value)
    {
        $user = auth()->user();
        $carbon = parent::asDateTime($value);
        if($value === NULL){
          return NULL;
        }
        return $carbon->locale("$user->locale")->isoFormat('L');
    }

    //Hire Date to handle locale settings
    protected function setTerminationDateAttribute($value)
    {
        $user = auth()->user();
        $this->attributes['termination_date'] = \Carbon\Carbon::createFromIsoFormat('L', $value, null, $user->locale)->isoFormat('Y-MM-DD');
    }

    protected function getMarriedAttribute($value)
    {
        if($value){
          return 'Yes';
        }
        else{
          return 'No';
        }

    }

    protected function setMarriedAttribute($value)
    {
        if($value==='Yes'){
          $this->attributes['married'] = 1;
        }
        else{
          $this->attributes['married'] = 0;
        }
    }

    public function addresses(){
      return $this->hasMany('App\Models\Address');
    }
}
