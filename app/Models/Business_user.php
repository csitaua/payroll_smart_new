<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business_user extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'business_id', 'role',
    ];

    public function user(){
      return $this->hasOne('App\Models\User');
    }

    public function business(){
      return $this->hasMany('App\Models\Business');
    }
}
