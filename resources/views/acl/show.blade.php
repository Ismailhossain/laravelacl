@extends('layouts.master')



@section('content')

    <h1>ACL</h1>

    <!-- will be used to show any messages -->
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    {!! Form::open(array( 'class'=>'form-horizontal inline','method'=>'get','files'=> true)) !!}


    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <td>ID</td>
            <td>Role Name</td>
            <td>Permission</td>
            <td>Actions</td>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>

                <td>{{ $role->role_title }}</td>

                {{-- access permission properties here.--}}
                <td>
                    @foreach ($role->permissions as $permission)


                        <li>{{ $permission->permission_title }}</li>
                    @endforeach
                </td>

                {{--@if(auth()->user()->can('can_edit'))--}}

                    <td>

                        <a class="btn btn-small btn-info" href="{{url('acl/edit/'.$role->id)}}">Add/Edit this Role</a>


                        <a class="btn btn-small btn-success" href="{{ url('acl/destroy/' . $role->id) }}">Delete this
                            Role</a>

                    </td>

                {{--@endif--}}
            </tr>
        @endforeach
        </tbody>
    </table>

    </div>

    {!! Form::close()  !!}


@stop
