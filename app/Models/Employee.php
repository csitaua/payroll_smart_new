<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name', 'last_name', 'id_number', 'tax_id_number', 'married', 'tax_group', 'payment_period', 'number_of_childrens', 'work_type',
        'number_of_work_days', 'email', 'termination_date', 'termination_reason',
    ];
    protected $casts = ['date_of_birth' => 'date', 'hire_date' => 'date',];

    public function addresses(){
      return $this->hasMany('App\Models\Address');
    }
}
