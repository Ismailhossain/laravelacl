@extends('layouts.header')
<body>

<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="/">
                    LaravelAcl
                </a>
            </li>
            <li>
                <a href="{{{url('user/create')}}}">User Registration</a>
            </li>

            <li>
                <a href="{{{url('user/show')}}}">User List</a>
            </li>

            <li>
                <a href="{{{url('acl/show')}}}">ACL List</a>
            </li>

            <li>
                <a href="{{{url('login')}}}">Sign In</a>
            </li>

            <li>
                <a href="{{ url('/logout') }}"
                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                    Sign Out
                </a>

                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            @yield('sidebar')

        </ul>

    </div>
    <!-- /#sidebar-wrapper -->
