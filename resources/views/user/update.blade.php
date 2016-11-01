

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


    {!!  Form::open(array('url' => 'user/update',  'method'=>'post', 'class'=>'form-horizontal inline','files'=> true)) !!}



    <fieldset>

        <legend>Update User</legend>
       <input type="hidden" name="id" value="{{$users->id}}">

        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Name</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="name" value="{{$users->name}}" id="name" placeholder="name">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-3">
                <input type="email" class="form-control" name="email" value="{{$users->email}}" id="email" placeholder="Email">

            </div>
        </div>

        <div class="form-group">
            <label for="role_title" class="col-sm-2 control-label">Role</label>
            <div class="col-sm-3">
                <select name="role_title[]" id="role_title" class="form-control" multiple="multiple" >
                        @foreach($roles as $role)
                                 <option value="{{$role->id}}" @foreach($users->roles as $selected) @if($role->id == $selected->id)selected="selected"@endif @endforeach>{{$role->role_title}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Photograph</label>
            <div class="col-sm-3">
                <input type="file" class="form-control" value="{{$users->image}} "   name="image" id="image" >
                <td>
                    <img class="img-responsive" src="{{ asset ($users->image)}}" >

                </td>

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




