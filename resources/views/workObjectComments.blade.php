@extends('main.workObjectLayot')

@section('workObjectSection')


    <div class="container mt-1" ">

        <form action={{ route('object.comment.add',$workObject->id) }} method="post">
            @csrf
            <div class="form-group">


                @foreach ($comments as $comment)
                    <span class="badge badge-pill badge-secondary"> </span>
                    <textarea  class="form-control" id="exampleFormControlTextarea1" rows="1" readonly="readonly" style="margin-top: 5px;resize: none;"> {{  $users[$comment->user_id] }} : {{ $comment->comment }}</textarea>
                @endforeach


                <textarea required name = "comment" class="form-control mt-1" id="exampleFormControlTextarea1" rows="2" style="resize: none;"></textarea>
                <button type="submit" class="btn btn-outline-success mt-1" >Добавить</button>
            </div>
        </form>

    </div>


@endsection
