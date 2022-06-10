@extends('main.workObjectLayot')

@section('workObjectSection')


    <div class="container" style="margin-top: 10px;">

        <form action={{ route('object.files.upload') }} method="post" enctype="multipart/form-data"  class="form-inline">
            @csrf
            <div >

                <input hidden type="text"  name="work_object_id" value="{{ $workObject->id }}" >
                <div class="input-group">
                    <input name="uploadedFile" onchange="this.form.submit()" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>


            </div>
        </form>

        @foreach($media as $mediaItem)
            <div class="card" style="margin-top: 10px;">
                <div class="card-body">
                    <img src="{{ $mediaItem->url}}" onerror="this.src='http://laravel/uploads/document.png';" style="width: 60px; height: 60px; border-radius: 10%;"><a class="link-primary px-2" href="{{$mediaItem->url}}">  Открыть {{ $mediaItem->title }} </a>
                </div>
            </div>

        @endforeach

    </div>


@endsection
