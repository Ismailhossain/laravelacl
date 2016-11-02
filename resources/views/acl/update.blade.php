@extends('layouts.master')

@section('content')

    @if(isset($errors))
        <div class="bg-danger">


            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach


        </div>
    @endif


    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif


    {!!  Form::open(array('url' => 'acl/update',  'method'=>'post', 'class'=>'form-horizontal inline','files'=> true)) !!}



    <fieldset>

        <legend>Add/Update Permissions</legend>
        <input type="hidden" name="id" value="{{$roles->id}}">


        {{--For multiple roles--}}

        <div class="form-group">
            <label for="role_title" class="col-sm-2 control-label">Name</label>

            <div class="col-sm-3">
                <input type="text" class="form-control" name="role_title" value="{{$roles->role_title}}" id="role_title"
                       placeholder="role_title">
            </div>
        </div>

        <div class="form-group">
            <label for="permission_title" class=" col-sm-2 control-label">Permission</label>

            <div class="col-sm-8">
                @foreach($permissions as $permission)
                    <input type="checkbox" name="permission_title[{{ $permission->id }}]" id="{{ $permission->id }}"
                           value="{{ $permission->id }}" {{ $roles->hasPermissions($permission) ? 'checked' : '' }} >
                    <span>{{ $permission->permission_title }}  </span>

                @endforeach
            </div>
        </div>


        {{--For permission  -   --}}


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </fieldset>
    {!! Form::close() !!}



@stop







