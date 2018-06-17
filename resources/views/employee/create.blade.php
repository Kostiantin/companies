@extends('layouts.app')

@section('title')

    <title>Create Employee</title>

@endsection

@section('content')

    <h1 class="page-header">Create Employee</h1>

    <form class="form" role="form" method="POST"
          action="{{route('employee_store')}}">

        {{ csrf_field() }}


        <!--  First Name -->

        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">

            <label class="control-label">First Name</label>

            <input type="text" name="first_name" id="first_name" value="{{old('first_name')}}">


            @if ($errors->has('first_name'))

                <div class="help-block text-danger">
                <strong>{{ $errors->first('first_name') }}</strong>
                </div>

            @endif

        </div>

        <!--  Last Name -->

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">

            <label class="control-label">Last Name</label>

            <input type="text" name="last_name" id="last_name" value="{{old('last_name')}}">


            @if ($errors->has('last_name'))

                <div class="help-block text-danger">
                    <strong>{{ $errors->first('last_name') }}</strong>
                </div>

            @endif

        </div>

        <!-- Email -->

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

            <label class="control-label">Email</label>


            <input type="text" name="email" id="email" value="{{old('email')}}">


            @if ($errors->has('email'))

                <div class="help-block text-danger">
                <strong>{{ $errors->first('email') }}</strong>
                </div>

            @endif

        </div>

        <!-- Phone -->

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">

            <label class="control-label">Phone</label>


            <input type="text" name="phone" id="phone" value="{{old('phone')}}">


            @if ($errors->has('phone'))

                <div class="help-block text-danger">
                <strong>{{ $errors->first('phone') }}</strong>
                </div>

            @endif

        </div>

        <!-- Company -->

        <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">

            <label class="control-label">Company</label>


            <select class="form-control" id="company_id" name="company_id">

                <option value="">Please Choose One</option>
                @foreach($companies as $company)
                    <option value="{{$company->id}}">{{$company->name}}</option>
                @endforeach

            </select>


            @if ($errors->has('company_id'))

                <span class="help-block text-danger">
                <strong>{{ $errors->first('company_id') }}</strong>
                </span>

            @endif

        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-primary btn-lg">
                Create
            </button>

        </div>

    </form>

@endsection

