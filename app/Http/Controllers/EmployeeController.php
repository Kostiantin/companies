<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;
use App\Mail\Welcome;


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
    public function create($company_id = null)
    {
        $real_company_id = null;
        $companies = Company::all();
        if (!empty($company_id)) {
            $chosen_company = Company::where('id',$company_id)->first();
            if (!empty($chosen_company)) {
                $real_company_id = $company_id;
            }
        }
        return view('employee.create', compact('companies','real_company_id'));
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

        $Employee = Employee::create(request(['first_name','last_name', 'email', 'company_id', 'phone']));

        \Mail::to($Employee->email)->send(new Welcome);

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
