
@extends('workLayout')



@section('content')


    <div class="container">
        <h1><span class="badge bg-secondary">{{ $workObject->title }}</span></h1>
        <span class="badge bg-primary">{{ $workObject->type->title }}</span>




    <div class="card text-left shadow-sm mt-1">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('object.edit') ? 'active' : '' }}" href="{{ route('object.edit',$workObject->id) }}">Объект</a>
                </li>
                @can('view additionalAttribute')
                    <li class="nav-item">
                        <a class="nav-link {{ (request()->routeIs('object.additionalAttributes')) ? 'active' : '' }}" href="{{ route('object.additionalAttributes',$workObject->id) }}">Доп атрибуты</a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('object.comments')) ? 'active' : '' }}" href="{{ route('object.comments',$workObject->id) }}">Заметки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('object.files')) ? 'active' : '' }}" href="{{ route('object.files',$workObject->id) }}">Вложения</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('object.history')) ? 'active' : '' }}" href="{{ route('object.history',$workObject->id) }}">История</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (request()->routeIs('object.tasks')) ? 'active' : '' }}" href="{{ route('object.tasks',$workObject->id) }}">Задачи</a>
                </li>
            </ul>
        </div>

        <div class="card-body" >

            @yield('workObjectSection')




        </div>

    </div>

    </div>












@endsection
