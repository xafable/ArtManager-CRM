@extends('main.workObjectLayot')

@section('workObjectSection')


    <div class="container mt-1 mb-1">

        <p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                Добавить задачу
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <form action="{{ route('task.store') }}" method="POST" >
                @csrf
                <div class="card card-body">
                    <div class="input-group mb-3">
                        <input hidden name = "work_object_id" value="{{$workObject->id}}" type="text">
                        <input required name="title" type="text" class="form-control" placeholder="Имя" aria-describedby="button-addon2">
                        <button id="objectTypeNextButton" class="btn btn-outline-secondary" type="submit" >Далее</button>
                    </div>
                </div>
            </form>
        </div>



        <div class="mt-2">
            @foreach ($tasks as $task)
                <div class="card border-secondary mb-3" >
                    <div class="card-header">
                        {{ $task->title }}
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


@endsection
