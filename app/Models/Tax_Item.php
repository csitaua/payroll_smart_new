<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax_Item extends Model
{
    use HasFactory;

    public $incrementing = false;
    public $timestamps = false;
    protected $primaryKey = ['year','position'];
}
