@extends('layouts.app')

@section('title')

    <title>Employees</title>

@endsection

@section('content')

    <h1 class="page-header">Employees</h1>

    @if($employees->count() > 0)

        <table class="table table-striped table-bordered table-hover table-condensed">

            <thead>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Company</th>
            <th>Date Created</th>
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
                </tr>

            @endforeach

            </tbody>

        </table>

    @else

        Sorry, no Employees

    @endif

@endsection