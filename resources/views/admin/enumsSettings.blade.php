@extends('admin.adminLayout')




@section('adminContent')


    <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Добавить
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <form action="{{ route('admin.enumInsert') }}" method="POST" id="workObjectTypeCreateForm">
            @csrf
            <div class="card card-body">
                <div class="input-group mb-3">
                    <input name="title" type="text" class="form-control" placeholder="Имя объекта" aria-describedby="button-addon2">
                    <button id="objectTypeNextButton" class="btn btn-outline-secondary" type="submit" >Далее</button>
                </div>
            </div>
        </form>
    </div>

                @foreach($enums as $enum)
                    <br>
                    <div class="card card-body">
                        <div class="card-body">
                            <h5 class="card-title">{{ $enum->title }}</h5>
                            <a href="{{ route('admin.enumEdit',$enum->id) }}" class="btn btn-outline-secondary">Редактировать</a>
                        </div>
                    </div>

                @endforeach





@endsection
