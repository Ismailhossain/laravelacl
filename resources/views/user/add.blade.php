@extends('layouts.master')


@section('title')
    @parent

    | Add User
@stop

@section('content')

    @if(isset($errors))
        <div class="alert-danger">


            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach


        </div>
    @endif


    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif


    {!!   Form::open(array('url' => 'user/store',  'method'=>'post', 'class'=>'form-horizontal inline','files'=> true)) !!}


    <fieldset>

        <legend>Add User</legend>
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>

            <div class="col-sm-3">
                <input type="text" class="form-control" name="name" value="{{Input::old('name')}}" id="name"
                       placeholder="Name">

            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>

            <div class="col-sm-3">
                <input type="email" class="form-control" name="email" value="{{Input::old('email')}}" id="email"
                       placeholder="Email">

            </div>
        </div>


        {{--For multiple roles--}}


        {{--@if(auth()->user()->can('can_create'))--}}


            <div class="form-group">
                <label for="role_title" class="col-sm-2 control-label">Role</label>

                <div class="col-sm-3">
                    {{--<select name="roles" id="roles" class="form-control" >--}}
                    <select name="role_title[]" id="role_title" class="form-control" multiple="multiple">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->role_title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        {{--@endif--}}


        {{-- End oF multiple roles--}}


        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>

            <div class="col-sm-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="password">

            </div>
        </div>
        <div class="form-group">
            <label for="confirm_password" class="col-sm-2 control-label">Confirm Password</label>

            <div class="col-sm-3">
                <input type="password" class="form-control" name="confirm_password" id="confirm_password"
                       placeholder="Confirm Password">

            </div>
        </div>
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Photograph</label>

            <div class="col-sm-3">
                <input type="file" class="form-control" name="image" id="image">

            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </div>
    </fieldset>


    {!! Form::close() !!}



@stop







