@extends('workLayout')

@section('content')

    <div class="container mt-2">

        <form action={{ route('task.update',$task->id) }} method="post"  style="margin-top: 20px;">
            @csrf
            <div class="container mt-5">
                <h4 class="text-muted">{{ $task->title }}</h4>
                @if(!is_null($task->work_object_id))
                <a class="btn btn-outline-primary btn-sm" href="{{route('object.edit',$task->work_object_id) }}" role="button">{{ $task->workObject->title }}</a>
                @endif
                    <hr>

                Статус
                <select name="status_id" class="form-select mb-3" id="inlineFormCustomSelectPref">
                    <option value="{{ $self_status->id }}" selected>{{ $self_status->title }}</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}">{{ $status->title }}</option>
                    @endforeach
                </select>


                <div class="row  mb-3">
                    <div class="col">
                        Начало
                        <input value="{{ $task->getHtmlStartDate() }}" name="start_date" type="date" class="form-control" >
                    </div>
                    <div class="col">
                         Конец
                        <input value="{{ $task->getHtmlFinishDate() }}" name="finish_date" type="date" class="form-control" >
                    </div>
                </div>

                Исполнители
                <select class="js-example-basic-multiple" name="performers[]" multiple="multiple" style="width: 100%;">
                    @foreach($users as $user)
                        <option id="{{ $user->id }}" value="{{ $user->id }}">{{ $user->fio }}</option>
                    @endforeach

                    @forelse($performers as $performer)
                         <option selected="selected" id="{{ $performer->id }}" value="{{ $performer->id }}">{{ $performer->fio }}</option>
                    @empty
                    @endforelse

                </select>



                <div class="row mt-3">
                    <textarea  name = "task_description" class="form-control" id="ex1" rows="3" >{{ $task->description }}</textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-outline-success mt-3">Сохранить</button>

        </form>




    </div>



@endsection







