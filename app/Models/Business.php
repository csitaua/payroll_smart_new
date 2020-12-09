<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name', 'registration_number', 'address', 'city', 'country', 'phone_1', 'phone_2',
    ];

    public function employees(){
      return $this->hasMany('App\Models\Employee');
    }

}
