<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::with('company')->orderBy('created_at', 'DESC')->get();

        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::all();
        return view('employee.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'company_id' => 'required|integer',
            'phone' => 'required',
        ]);

        $Employee = new Employee;
        $Employee->first_name = $request->input('first_name');
        $Employee->last_name = $request->input('last_name');
        $Employee->email = $request->input('email');
        $Employee->company_id = $request->input('company_id');
        $Employee->phone = $request->input('phone');

        $Employee->save();
        return redirect()->route('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all();
        return view('employee.edit', compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Employee $employee)
    {

        $this->validate(request(),[
            'first_name' => 'required|max:191',
            'last_name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'company_id' => 'required|integer',
            'phone' => 'required',
        ]);

        $employee->first_name = request()->input('first_name');
        $employee->last_name = request()->input('last_name');
        $employee->email = request()->input('email');
        $employee->company_id = request()->input('company_id');
        $employee->phone = request()->input('phone');

        $employee->save();
        return redirect()->route('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees');
    }
}
