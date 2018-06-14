@extends('layouts.app')

@section('title')

    <title>Companies</title>

@endsection

@section('content')

    <h1 class="page-header">Companies</h1>

    Create a new company: <a class="btn btn-success" href="{{route('company_create')}}">Create</a>
    @if($companies->count() > 0)
        <hr>
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
                    <td><a href="{{route('company_edit',$company->id)}}" class="btn btn-primary btn-sm">Edit</a><a href="{{route('company_destroy',$company->id)}}" class="btn btn-danger btn-sm">Remove</a></td>
                </tr>

            @endforeach

            </tbody>

        </table>

    @else

        Sorry, no Companies

    @endif

@endsection