@extends('main.workObjectLayot')

@section('workObjectSection')


    <div class="container" style="margin-top: 10px;">


        @foreach($histories as $history)
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                  {{  $users[$history->user_id] }} : {{ $history->objectAction }} {{ $history->objectData }} {{ $history->newValue }}
                </div>
            </div>

        @endforeach

    </div>


@endsection
