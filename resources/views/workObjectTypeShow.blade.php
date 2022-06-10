@extends('workLayout')

@section('content')


<div class="container">

    <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Добавить шаблон
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <form action="{{ route('object.model.insert') }}" method="POST" id="workObjectTypeCreateForm">
            @csrf
        <div class="card card-body">
            <div class="input-group mb-3">
                <input required name="title" type="text" class="form-control" placeholder="Имя" aria-describedby="button-addon2">
                <button id="objectTypeNextButton" class="btn btn-outline-secondary" type="submit" >Далее</button>
            </div>
        </div>
        </form>
    </div>
    <br>

    @foreach($workObjectTypes as $workObjectType)
        <div class="card text-dark bg-light mb-3">
            <div class="card-header">{{ $workObjectType->title }}</div>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <button onclick="location.href = '{{ route('object.model.edit',$workObjectType->id) }}'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >Редактировать</button>

            </div>
        </div>
    @endforeach


</div>


@endsection



