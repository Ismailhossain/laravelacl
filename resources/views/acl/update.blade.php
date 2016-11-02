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


{{--@section('scripts')--}}

{{--<script type="text/javascript">--}}
{{--/* <![CDATA[ */--}}
{{--jQuery(function(){--}}
{{--jQuery("#name").validate({--}}
{{--expression: "if (VAL) return true; else return false;",--}}
{{--message: "Please enter the Name field"--}}
{{--});--}}

{{--//        jQuery("#role_title").validate({--}}
{{--//    expression: "if (VAL) return true; else return false;",--}}
{{--//    message: "Please enter the RoleName field"--}}
{{--//    });--}}
{{--//        jQuery("#role").validate({--}}
{{--//            expression: "if (VAL) return true; else return false;",--}}
{{--//            message: "Please enter the Role"--}}
{{--//        });--}}
{{--jQuery("#image").validate({--}}
{{--expression: "if (VAL) return true; else return false;",--}}
{{--message: "Please enter the Image field"--}}
{{--});--}}


{{--jQuery("#email").validate({--}}
{{--expression: "if (VAL.match(/^[^\\W][a-zA-Z0-9\\_\\-\\.]+([a-zA-Z0-9\\_\\-\\.]+)*\\@[a-zA-Z0-9_]+(\\.[a-zA-Z0-9_]+)*\\.[a-zA-Z]{2,4}$/)) return true; else return false;",--}}
{{--message: "Please enter a valid Email ID"--}}
{{--});--}}
{{--});--}}

{{--</script>--}}

{{--@stop--}}




