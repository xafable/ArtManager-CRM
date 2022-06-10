@extends('main.layout')
@section('navBar')
@endsection

    <nav class="navbar fixed-bottom bg-light border-top border-primary">
        <div class="container justify-content-center">
                    <a class="btn btn-outline-primary" href="{{ route('main') }}">На сайт</a>
        </div>
    </nav>

<div class="container mt-5">
     @yield('dashboardContent')
</div>

@section('content')
@endsection
