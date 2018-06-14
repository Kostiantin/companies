@extends('layouts.app')

@section('title')

    <title>Employees</title>

@endsection

@section('content')

    <h1 class="page-header">Employees</h1>

    Create a new Employee: <a class="btn btn-success" href="{{route('employee_create')}}">Create</a>


    @if($employees->count() > 0)
        <hr>
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
                    <td><a href="{{route('employee_edit',$employee->id)}}" class="btn btn-primary btn-sm">Edit</a><a href="{{route('employee_destroy',$employee->id)}}" class="btn btn-danger btn-sm">Remove</a></td>
                </tr>

            @endforeach

            </tbody>

        </table>

    @else

        Sorry, no Employees

    @endif

@endsection