@extends('layouts.app')

@section('title')

    <title>{{ __('Create Employee')}}</title>

@endsection

@section('content')

    <h1 class="page-header">{{ __('Create Employee')}}</h1>

    <form class="form" role="form" method="POST" class="form-horizontal"
          action="{{route('employee_store')}}">

        {{ csrf_field() }}


        <!--  First Name -->

        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-4">
                    <label class="control-label">{{ __('First Name')}}</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="first_name" id="first_name" value="{{old('first_name')}}">


                    @if ($errors->has('first_name'))

                        <div class="help-block text-danger">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </div>

                    @endif
                </div>
            </div>
        </div>

        <!--  Last Name -->

        <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-4">
                    <label class="control-label">{{ __('Last Name')}}</label>

                </div>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="last_name" id="last_name" value="{{old('last_name')}}">
                    @if ($errors->has('last_name'))

                        <div class="help-block text-danger">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </div>

                    @endif
                </div>
            </div>
        </div>

        <!-- Email -->

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-4">
                    <label class="control-label">{{ __('Email')}}</label>

                </div>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="email" id="email" value="{{old('email')}}">


                    @if ($errors->has('email'))

                        <div class="help-block text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                        </div>

                    @endif
                </div>
            </div>
        </div>

        <!-- Phone -->

        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-4">
                    <label class="control-label">{{ __('Phone')}}</label>
                </div>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="phone" id="phone" value="{{old('phone')}}">
                    @if ($errors->has('phone'))

                        <div class="help-block text-danger">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </div>

                    @endif
                </div>
            </div>
        </div>

        <!-- Company -->

        <div class="form-group{{ $errors->has('company_id') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-4">
                    <label class="control-label">{{ __('Company')}}</label>
                </div>
                <div class="col-md-8">

                    <select class="form-control" id="company_id" name="company_id">

                        <option value="">{{ __('Please Choose One')}}</option>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}" @if ($real_company_id == $company->id) selected @endif>{{$company->name}}</option>
                        @endforeach

                    </select>
                    @if ($errors->has('company_id'))

                        <span class="help-block text-danger">
                <strong>{{ $errors->first('company_id') }}</strong>
                </span>

                    @endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="submit" class="btn btn-primary btn-md">
                        {{ __('Create')}}
                    </button>
                </div>
            </div>
        </div>

</form>

@endsection

