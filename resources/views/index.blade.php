@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Companies</h2>
            @if($companies->count() > 0)

                <table class="table table-striped table-bordered table-hover table-condensed content-tbl">

                    <thead>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                    </thead>

                    <tbody>

                    @foreach($companies as $company)

                        <tr>
                            <td><img class="thumbnail" style="max-height: 40px;" src="/storage/logo_images/{{$company->logo}}" alt=""/></td>
                            <td><a href="/company/{{ $company->id }}">{{ $company->name }}</a></td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->website }}</td>
                            <td>{{ $company->created_at }}</td>
                            <td><a href="{{route('company_edit',$company->id)}}" class="btn btn-primary btn-sm">Edit</a><a href="{{route('company_destroy',$company->id)}}" class="btn btn-danger btn-sm" onclick="return ConfirmDelete('All employees will also be deleted. Are you sure you want to delete?');">Remove</a></td>
                        </tr>

                    @endforeach

                    </tbody>

                </table>
            @else

                Sorry, no Companies

            @endif
        </div>
        <div class="col-md-12">
            <h2>Employees</h2>
            @if($employees->count() > 0)

                <table class="table table-striped table-bordered table-hover table-condensed">

                    <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Company</th>
                    <th>Date Created</th>
                    <th>Actions</th>
                    </thead>

                    <tbody>

                    @foreach($employees as $employee)

                        <tr>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>{{ $employee->created_at }}</td>
                            <td><a href="{{route('employee_edit',$employee->id)}}" class="btn btn-primary btn-sm">Edit</a><a href="{{route('employee_destroy',$employee->id)}}" class="btn btn-danger btn-sm" onclick="return ConfirmDelete('Are you sure you want to delete?');">Remove</a></td>
                        </tr>

                    @endforeach

                    </tbody>

                </table>
            @else

                Sorry, no Employees

            @endif
        </div>
    </div>
</div>
@endsection
