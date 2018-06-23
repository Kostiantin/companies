@extends('layouts.app')

@section('title')

    <title>{{ __('Companies')}}</title>

@endsection

@section('content')

    <h1 class="page-header">{{ __('Companies')}}</h1>

    {{ __('Create a new company')}}: <a class="btn btn-success" href="{{route('company_create')}}">{{ __('Create')}}</a>
    @if($companies->count() > 0)
        <hr>
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
                    <td>
                        <a href="{{route('company_edit',$company->id)}}" class="btn btn-primary btn-sm">{{ __('Edit')}}</a>
                        <a href="{{route('company_destroy',$company->id)}}" class="btn btn-danger btn-sm" onclick="return ConfirmDelete('{{ __('All employees will also be deleted. Are you sure you want to delete?')}}');">{{ __('Remove')}}</a>
                        <a href="{{route('employee_create',$company->id)}}" class="btn btn-info btn-sm">{{ __('Add Employee')}}</a>
                    </td>
                </tr>

            @endforeach

            </tbody>

        </table>
    @else

        {{ __('Sorry, no Companies')}}

    @endif

@endsection