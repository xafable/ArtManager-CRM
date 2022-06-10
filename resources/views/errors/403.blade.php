@extends('main.layout')

@section('navBar')
@endsection




@section('content')

    <div class="container" style="margin-top: 200px;">


        <div class="row align-items-center">
            <div class="col">
            </div>
            <div class="col">
                <h1 class="display-2">Недостаточно прав </h1>
                <hr>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-lg"  role="button" >Назад</a>
            </div>
            <div class="col">
            </div>
        </div>

    </div>

@endsection
