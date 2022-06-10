@extends('main.layout')


@section('content')

    <div class="container mt-5">
<form action="{{ route('auth.auth') }}" method="POST" class="col s12">


            <div class="input-group mb-3">
                <input required name="name" type="text" class="form-control" placeholder="Логин" aria-label="Username" aria-describedby="basic-addon1">
            </div>

            <div class="input-group mb-3">
                <input required name="password" type="password" class="form-control" placeholder="Пароль" aria-label="Password" aria-describedby="basic-addon1">
            </div>

            @csrf

            <button class="btn btn-outline-primary" type="submit" name="action">
               Войти
            </button>

            <a class="btn btn-outline-danger" href="{{ route('google.auth') }}" class="link-danger">Google</a>
           <a class="btn btn-primary" href="{{ route('auth.create') }}" class="link-danger">Регистрация</a>

</form>
    </div>
@endsection


