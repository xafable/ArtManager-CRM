@extends('main.layout')

@section('navBar')

    <nav class="navbar sticky-top shadow-sm p-3  bg-body rounded">
        <div class="container">
            <ul class="nav nav-pills card-header-pills">
                <li class="nav-item dropdown">
                    @auth()
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">{{ \Illuminate\Support\Facades\Auth::user()->fio }}</a>
                    @endauth
                    @guest()
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Гость</a>
                    @endguest
                    <ul class="dropdown-menu">
                        @auth()
                            <li>
                                <a class="dropdown-item" href="{{ route('user.tasks') }}">
                                    Мои задачи
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        {{ \App\Models\User::getTasksCount() }}
                                        <span class="visually-hidden">Задачи</span>
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('user.profile') }}">
                                    Мой профиль
                                </a>
                            </li>

                        @endauth
                        <li><a class="dropdown-item" href="{{ route('admin.searchSettings') }}">Администрирование</a></li>
                        <li><hr class="dropdown-divider"></li>

                        @guest()
                            <li><a class="dropdown-item" href="{{ route('auth.login') }}">Вход</a></li>
                        @endguest

                        @auth()
                            <li><a class="dropdown-item" href="{{ route('auth.logout') }}">Выход</a></li>
                        @endauth


                    </ul>
                </li>

                <li class="nav-item dropdown">
                    @auth()
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            Роль ({{ Auth::user()->roles->pluck('name')[0] ?? '' }})
                        </button>
                    @endauth

                    <ul class="dropdown-menu">



                        @foreach($roles as $role)

                            <li><a class="dropdown-item" href="{{ route('auth.changeRole',$role->id) }}">{{ $role->name }}</a></li>
                        @endforeach



                    </ul>
                </li>


                <li class="nav-item dropdown">
                    @auth()
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Модерирование</a>
                    @endauth

                    <ul class="dropdown-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('object.model.show') }}">Шаблоны</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('status.show') }}">Типы статусов</a>
                        </li>

                    </ul>
                </li>




                <li class="nav-item" >
                    <a class="nav-link {{ (request()->routeIs('object.show')) || request()->routeIs('object.showByType') || request()->routeIs('object.showByFilter') ? 'active' : '' }}" href="{{ route('object.show') }}" >Объекты</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('task.showAll')) ? 'active' : '' }}" href="{{ route('task.showAll') }}">Задачи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('calendar.show')) ? 'active' : '' }}" href="{{ route('calendar.show') }}">Календарь</a>
                </li>
            </ul>
        </div>
    </nav>

@endsection



