@extends('workLayout')

@section('content')




    <div class="container">

        <div class="row">
            <div class="col-xs-auto col-md-3">
                <div class="accordion" id="accordionPanelsStayOpenExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Фильтр
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">
                                <form action="{{ route('task.showAll')  }}" method="GET">

                                    <div class="form-floating">
                                <select name="filters[workObjectType]" class="form-select" aria-label="Default select example">
                                    <option selected></option>
                                   @foreach($workObjects as $workObject)
                                    <option  @if(isset(request()->filters['workObjectType']))
                                             {{ request()->filters['workObjectType'] == $workObject->id ? 'selected' : '' }}
                                             @endif
                                         value="{{$workObject->id}}">{{ $workObject->title }}</option>
                                   @endforeach
                                </select>
                                        <label>Шаблон объекта</label>
                                    </div>
                                <br>

                                    <div class="form-floating">
                                <select  name="filters[statusId]" class="form-select" aria-label="Default select example">
                                    <option selected></option>
                                    @foreach($taskStatuses as $taskStatus)
                                        <option @if(isset(request()->filters['statusId']))
                                                {{ request()->filters['statusId'] == $taskStatus->id ? 'selected' : '' }}
                                                @endif
                                            value="{{$taskStatus->id}}">{{ $taskStatus->title }}</option>
                                    @endforeach
                                </select>
                                        <label>Статус</label>
                                    </div>
                                    <br>

                                    <button class="btn btn-outline-secondary" type="submit">Применить</button>
                                </form>



                            </div>
                        </div>
                    </div>


                </div>
            </div>

            <div class="col-xs-auto col-md-9">

                <p>
                    <button class="btn btn-primary mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                        Добавить задачу
                    </button>
                </p>
                <div class="collapse" id="collapseExample">
                    <form action="{{ route('task.store') }}" method="POST" >
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



                @foreach($tasks as $task)
                    <div class="card text-dark bg-light mb-3" >
                        <div class="card-header">
                            {{ $task->title }}
                            <span class="badge bg-primary"> {{ $task->workObject->title ?? 'без объекта' }}</span>

                           @switch($task->status_id)
                            @case(1)
                                <span class="badge bg-primary"> {{ $taskStatuses->firstWhere('id', $task->status_id)->title  }}</span>
                                @break
                            @case(2)
                                <span class="badge bg-warning"> {{ $taskStatuses->firstWhere('id', $task->status_id)->title  }}</span>
                                @break
                            @case(3)
                                <span class="badge bg-success"> {{ $taskStatuses->firstWhere('id', $task->status_id)->title  }}</span>
                                @break
                            @case(4)
                                <span class="badge bg-secondary"> {{ $taskStatuses->firstWhere('id', $task->status_id)->title  }}</span>
                                @break
                            @case(5)
                                <span class="badge bg-success"> {{ $taskStatuses->firstWhere('id', $task->status_id)->title  }}</span>
                                @break
                            @default
                                <span class="badge bg-dark"> {{ $taskStatuses->firstWhere('id', $task->status_id)->title  }}</span>
                            @endswitch

                        </div>
                        <div class="card-body" >
                            <h5 class="card-title"></h5>
                            <p class="card-text">{{ $task->description }}</p>
                            <button onclick="location.href = '{{ route('task.edit',$task->id) }}'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >К задаче</button>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    <div class="container">
        <div class="d-flex justify-content-center"> {{ $tasks->withQueryString()->links() }}</div>
    </div>



@endsection







