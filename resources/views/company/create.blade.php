@extends('layouts.app')

@section('title')

    <title>Create Company</title>

@endsection

@section('content')

    <h1 class="page-header">Create Company</h1>

    <form class="form" role="form" method="POST"
          action="{{ url('/company/store') }}"
          enctype="multipart/form-data">

        {{ csrf_field() }}


        <!-- name Form Input -->



        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">

            <label class="control-label">Name</label>

            <input type="text" name="name" id="name" value="{{old('name')}}">


            @if ($errors->has('name'))

                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
                </span>

            @endif

        </div>

        <!-- is_featured Form Input -->

        <div class="form-group{{ $errors->has('is_featured') ? ' has-error' : '' }}">

            <label class="control-label">Is Featured</label>


            <select class="form-control" id="is_featured" name="is_featured">
                <option value="{{old('is_featured')}}">
                    {{ ! is_null(old('is_featured')) ?
                    (old('is_featured') == 1 ? 'Yes' :'No')
                    : 'Please Choose One'}}</option>
                <option value="1">Yes</option>
                <option value="0">No</option>
            </select>


            @if ($errors->has('is_featured'))

                <span class="help-block">
                <strong>{{ $errors->first('is_featured') }}</strong>
                </span>

            @endif

        </div>

        <!-- image file Form Input -->

        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">

            <div class="form-group">
                <label class="control-label">Primary Image
                </label>

                <input type="file" name="image" id="image">
            </div>

            @if ($errors->has('image'))

                <span class="help-block">
                <strong>{{ $errors->first('image') }}</strong>
                </span>

            @endif


            <div class="form-group">

                <button type="submit" class="btn btn-primary btn-lg">

                    Create

                </button>

            </div>
        </div>

    </form>

@endsection



@endsection