@extends('layouts.app')

@section('title')

    <title>Companies</title>

@endsection

@section('content')

    <h1 class="page-header">Companies</h1>

    Create a new company: <a class="btn btn-success" href="/companies/create">Create</a>

    @if($companies->count() > 0)
        <hr>
        <table class="table table-striped table-bordered table-hover table-condensed">

            <thead>
            <th>Logo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Website</th>
            <th>Date Created</th>
            </thead>

            <tbody>

            @foreach($companies as $company)

                <tr>
                    <td>{{ $company->logo }}</td>
                    <td><a href="/company/{{ $company->id }}">{{ $company->name }}</a></td>
                    <td>{{ $company->email }}</td>
                    <td>{{ $company->website }}</td>
                    <td>{{ $company->created_at }}</td>
                </tr>

            @endforeach

            </tbody>

        </table>

    @else

        Sorry, no Companies

    @endif

@endsection