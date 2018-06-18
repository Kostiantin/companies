<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Employee;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('created_at', 'DESC')->get();
        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'website' => 'required|max:191',
            'logo' => 'required|image|max:1999',
        ]);

        if ($request->hasFile('logo')) {
            $fileNameWithExt = $request->file('logo')->getClientOriginalName();

            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = $request->file('logo')->getClientOriginalExtension();

            $fileNameToStore = $filename . '_' . time() . '_' . $extension;

            $path = $request->file('logo')->storeAs('public/logo_images', $fileNameToStore);
        }
        else {
            $fileNameToStore = 'http://via.placeholder.com/100x100';
        }

        $Company = new Company;
        $Company->name = $request->input('name');
        $Company->email = $request->input('email');
        $Company->website = $request->input('website');
        $Company->logo = $fileNameToStore;
        $Company->save();

        return redirect()->route('companies');
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
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Company $company)
    {
        $this->validate(request(),[
            'name' => 'required|max:191',
            'email' => 'required|email|max:191',
            'website' => 'required|max:191',
            'logo' => 'required|image|max:1999',
        ]);

        if (request()->hasFile('logo')) {
            $fileNameWithExt = request()->file('logo')->getClientOriginalName();

            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            $extension = request()->file('logo')->getClientOriginalExtension();

            $fileNameToStore = $filename . '_' . time() . '_' . $extension;

            $path = request()->file('logo')->storeAs('public/logo_images', $fileNameToStore);
        }
        else {
            $fileNameToStore = 'http://via.placeholder.com/100x100';
        }

        Storage::delete('/public/logo_images/'.$company->logo);

        $company->name = request()->input('name');
        $company->email = request()->input('email');
        $company->website = request()->input('website');
        $company->logo = $fileNameToStore;
        $company->save();

        return redirect()->route('companies');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        Storage::delete('/public/logo_images/'.$company->logo);

        // remove all employees
        Employee::where('company_id', $company->id)->delete();

        $company->delete();
        return redirect()->route('companies');
    }
}
