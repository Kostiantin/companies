@extends('layouts.app')

@section('title')

    <title>{{ __('Create Company')}}</title>

@endsection

@section('content')

    <h1 class="page-header">{{ __('Create Company')}}</h1>

    <form class="form" role="form" method="POST"
          action="{{route('company_store')}}"
          enctype="multipart/form-data" class="form-horizontal">

        {{ csrf_field() }}


        <!-- Name -->



        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-4">
                    <label class="control-label">{{ __('Name')}}</label>

                </div>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="name" id="name" value="{{old('name')}}">


                    @if ($errors->has('name'))

                        <div class="help-block text-danger">
                        <strong>{{ $errors->first('name') }}</strong>
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

        <!-- Logo -->

        <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">

            <div class="form-group">
                <div class="row">
                    <div class="col-md-4">
                        <label class="control-label">{{ __('Company Logo')}}</label>
                    </div>
                    <div class="col-md-8">
                        <input class="form-control" type="file" name="logo" id="logo">
                        @if ($errors->has('logo'))

                            <div class="help-block text-danger">
                                <strong>{{ $errors->first('logo') }}</strong>
                            </div>

                        @endif
                    </div>
                </div>
            </div>



        </div>

        <!-- Website -->

        <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
            <div class="row">
                <div class="col-md-4">
                    <label class="control-label">{{ __('Website')}}</label>

                </div>
                <div class="col-md-8">
                    <input class="form-control" type="text" name="website" id="website" value="{{old('website')}}">

                    @if ($errors->has('website'))

                        <div class="help-block text-danger">
                        <strong>{{ $errors->first('website') }}</strong>
                        </div>

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

