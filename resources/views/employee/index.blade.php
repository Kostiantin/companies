@extends('layouts.app')

@section('title')

    <title>{{ __('Employees')}}</title>

@endsection

@section('content')

    <h1 class="page-header">{{ __('Employees')}}</h1>

    {{ __('Create a new Employee')}}: <a class="btn btn-success" href="{{route('employee_create')}}">{{ __('Create')}}</a>


    @if($employees->count() > 0)
        <hr>
        <table class="table table-striped table-bordered table-hover table-condensed">

            <thead>
            <th>{{ __('First Name')}}</th>
            <th>{{ __('Last Name')}}</th>
            <th>{{ __('Email')}}</th>
            <th>{{ __('Phone')}}</th>
            <th>{{ __('Company')}}</th>
            <th>{{ __('Date Created')}}</th>
            <th>{{ __('Actions')}}</th>
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
                    <td><a href="{{route('employee_edit',$employee->id)}}" class="btn btn-primary btn-sm">{{ __('Edit')}}</a><a href="{{route('employee_destroy',$employee->id)}}" class="btn btn-danger btn-sm" onclick="return ConfirmDelete('Are you sure you want to delete?');">{{ __('Remove')}}</a></td>
                </tr>

            @endforeach

            </tbody>

        </table>
    @else

        {{ __('Sorry, no Employees')}}

    @endif

@endsection