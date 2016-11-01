

@extends('layouts.master')



@section('content')

    <h1>All the Users</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif


    {!! Form::open(array( 'class'=>'form-horizontal inline','method'=>'get','files'=> true)) !!}


    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Role</td>
            <td>Email</td>
            <td>Image</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{{ $user->id }}}</td>

                <td>{{{ $user->name }}}</td>

                {{-- access role properties here.--}}
                <td>
                @foreach ($user->roles as $role)


                    <li>{{ $role->role_title }}</li>
                @endforeach
                </td>

                <td>{{ $user->email }}</td>
                <td>

                    <img src="{{ asset ($user->image)}}" style="width:100px;height:100px" class="img-polaroid" alt="" >

                </td>


                {{--@if(auth()->user()->can('can_create'))--}}
                <td>

                    <a class="btn btn-small btn-info" href="{{url('user/edit/'.$user->id)}}">Edit this User</a>


                    <a class="btn btn-small btn-success" href="{{ url('user/destroy/' . $user->id) }}">Delete this User</a>

                </td>

                {{--@endif--}}
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--<div class="pagination"> {!! str_replace('/?', '?', $users->render()) !!}--}}

    </div>



    {!! Form::close()  !!}


@stop
