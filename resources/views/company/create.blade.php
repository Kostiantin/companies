@extends('layouts.app')

@section('title')

    <title>Create Company</title>

@endsection

@section('content')

    <h1 class="page-header">Create Company</h1>

    <form class="form" role="form" method="POST"
          action="{{route('company_store')}}"
          enctype="multipart/form-data">

        {{ csrf_field() }}


        <!-- Name -->



        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <label class="control-label">Name</label>

            <input type="text" name="name" id="name" value="{{old('name')}}">


            @if ($errors->has('name'))

                <div class="help-block text-danger">
                <strong>{{ $errors->first('name') }}</strong>
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

        <!-- Logo -->

        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">

            <div class="form-group">
                <label class="control-label">Company Logo</label>
                <input type="file" name="logo" id="logo">
            </div>

            @if ($errors->has('logo'))

                <div class="help-block text-danger">
                    <strong>{{ $errors->first('logo') }}</strong>
                </div>

            @endif

        </div>

        <!-- Website -->

        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">

            <label class="control-label">Website</label>


            <input type="text" name="website" id="website" value="{{old('website')}}">


            @if ($errors->has('website'))

                <div class="help-block text-danger">
                <strong>{{ $errors->first('website') }}</strong>
                </div>

            @endif

        </div>

        <div class="form-group">

            <button type="submit" class="btn btn-primary btn-lg">
                Create
            </button>

        </div>

    </form>

@endsection

