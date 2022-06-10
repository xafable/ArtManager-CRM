
@extends('admin.adminLayout')




@section('adminContent')


    <div class="container">
        <h1><span class="badge bg-secondary"></span></h1>
        <span class="badge bg-primary"></span>



        <div class="card text-left shadow-sm">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.generalOptions') ? 'active' : '' }} " href="{{ route('admin.generalOptions',$roleId) }}">Общее</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.roleWOTypeShow') || request()->routeIs('admin.roleWOTypeOptions') ? 'active' : '' }}" href="{{ route('admin.roleWOTypeShow',$roleId) }}">Шаблоны</a>
                    </li>

                </ul>
            </div>

            <div class="card-body">


                @yield('options')

            </div>
        </div>
    </div>










@endsection
