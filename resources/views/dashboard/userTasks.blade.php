@extends('dashboard.dashboardLayout')



@section('dashboardContent')



            <div class="container" >
                @forelse($tasks as $task)

                    <div class="card text-dark bg-light mb-3" >
                        <div class="card-header">
                            {{ $task->title }}
                            <span class="badge bg-primary"> {{ $task->workObject->title ?? 'без объекта' }}</span>
                        </div>
                        <div class="card-body" >
                            <h5 class="card-title"></h5>
                            <p class="card-text">{{ $task->description }}</p>
                            <button onclick="location.href = '{{ route('task.edit',$task->id) }}'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >К задаче</button>
                        </div>
                    </div>

                @empty

                @endforelse
            </div>










@endsection
