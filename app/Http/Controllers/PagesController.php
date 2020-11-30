<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Business;


class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function about(){
      return view('pages.about');
    }

    public function dashboard(){
      return view('pages.dashboard', ['business' => Business::where('id',1)->first()]);
    }

    public function payroll(){
      return view('pages.payroll', ['business' => Business::where('id',1)->first()]);
    }
}
