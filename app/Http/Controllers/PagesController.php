<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Business;
use App\Models\Employee;


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
      $business = Business::where('id',auth()->user()->business_user->business_id)->first();
      $employees = Employee::where('business_id',$business->id);
      return view('pages.payroll', ['user' => auth()->user(), 'business' => $business, 'employees' => $employees]);
    }

    public function employeePartial(){
      $search = request('search');
      $business = Business::where('id',auth()->user()->business_user->business_id)->first();
      $employees = Employee::search($search);
      return view('sections.payroll.employee-partial', ['user' => auth()->user(), 'business' => $business, 'employees' => $employees]);
    }
}
