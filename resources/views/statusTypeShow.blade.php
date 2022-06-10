@extends('workLayout')

@section('content')


    <div class="container">

        <p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Добавить
            </button>
        </p>
        <div class="collapse mb-3" id="collapseExample">
            <form action="{{ route('status.insert') }}" method="POST" id="workObjectTypeCreateForm">
                @csrf
                <div class="card card-body">
                    <div class="input-group mb-3">
                        <input required name="title" type="text" class="form-control" placeholder="Имя объекта" aria-describedby="button-addon2">
                        <button id="objectTypeNextButton" class="btn btn-outline-secondary" type="submit" >Далее</button>
                    </div>
                </div>
            </form>
        </div>

        @foreach($statusTypes as $statusType)
            <div class="card text-dark bg-light mb-3" style="width: 100%;">
                <div class="card-header">{{ $statusType->title }}</div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <button onclick="location.href ='{{ route('status.edit',$statusType->id) }}'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >Редактировать</button>

                </div>
            </div>
        @endforeach


    </div>


@endsection

