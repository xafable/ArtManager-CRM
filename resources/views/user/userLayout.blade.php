@extends('main.layout')

@section('navBar')
    <nav class="navbar fixed-bottom bg-light border-top border-primary">
        <div class="container justify-content-center">
            <a class="btn btn-outline-primary" href="{{ route('main') }}">На сайт</a>
        </div>
    </nav>
@endsection


@section('content')
<div class="container ">
     @yield('content')
</div>
@endsection
