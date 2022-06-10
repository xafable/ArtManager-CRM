@extends('main.layout')


@section('content')

    <div class="container mt-5">
        <form action="{{ route('auth.store') }}" method="POST" class="col s12">

            @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input required type="email" class="form-control" name="email" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Логин</label>
                    <input required type="text" class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">ФИО</label>
                    <input required type="text" class="form-control" name="fio" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Полное имя</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input required type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Telegram Id</label>
                    <input type="number" class="form-control" name="telegramId" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">Уникальный идентификатор Telegram</div>
                </div>

                <button type="submit" class="btn btn-primary">Регистрация</button>

        </form>
    </div>
@endsection


