<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;

class IndexController extends Controller
{
    public function index()
    {
        $companies = Company::orderBy('created_at', 'DESC')->get();
        $employees = Employee::with('company')->orderBy('created_at', 'DESC')->get();
        return view('index', compact('companies', 'employees'));
    }
}
