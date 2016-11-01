

@extends('layouts.master')


@section('title')
    @parent

    | Add ACL
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


    {!!   Form::open(array('url' => 'acl/store',  'method'=>'post', 'class'=>'form-horizontal inline','files'=> true)) !!}


    <fieldset>

        <legend>Add ACL</legend>

            {{--For multiple roles--}}


            <div class="form-group">
                <label for="role_title" class="col-sm-2 control-label">Role</label>
                <div class="col-sm-3">
                    <select name="role_title" id="role_title" class="form-control" >
                        @foreach($roles as $role)
                            <option value="{{$role->id}}" >{{$role->role_title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            {{-- End oF multiple roles--}}


            {{--For permission  -   --}}


            <div class="form-group">
            <label for="permission_title" class=" col-sm-2 control-label">Permission</label>
            <div class="col-sm-8">
            @foreach($permissions as $permission)
            <input type="checkbox" name="permission_title[{{ $permission->id }}]" id="{{ $permission->id }}" value="{{ $permission->id }}">
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







