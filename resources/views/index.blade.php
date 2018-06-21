@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>{{ __('Companies')}}</h2>
            @if($companies->count() > 0)

                <table class="table table-striped table-bordered table-hover table-condensed content-tbl">

                    <thead>
                    <th>{{ __('Logo')}}</th>
                    <th>{{ __('Name')}}</th>
                    <th>{{ __('Email')}}</th>
                    <th>{{ __('Website')}}</th>
                    <th>{{ __('Date Created')}}</th>
                    <th>{{ __('Actions')}}</th>
                    </thead>

                    <tbody>

                    @foreach($companies as $company)

                        <tr>
                            <td><img class="thumbnail" style="max-height: 40px;" src="/storage/logo_images/{{$company->logo}}" alt=""/></td>
                            <td><a href="/company/{{ $company->id }}">{{ $company->name }}</a></td>
                            <td>{{ $company->email }}</td>
                            <td>{{ $company->website }}</td>
                            <td>{{ $company->created_at }}</td>
                            <td><a href="{{route('company_edit',$company->id)}}" class="btn btn-primary btn-sm">{{ __('Edit')}}</a><a href="{{route('company_destroy',$company->id)}}" class="btn btn-danger btn-sm" onclick="return ConfirmDelete('{{ __('All employees will also be deleted. Are you sure you want to delete?')}}');">{{ __('Remove')}}</a></td>
                        </tr>

                    @endforeach

                    </tbody>

                </table>
            @else

            {{ __('Sorry, no Companies')}}

        @endif
    </div>
    <div class="col-md-12">
        <h2>{{ __('Employees')}}</h2>
        @if($employees->count() > 0)

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
</div>
</div>
</div>
@endsection
