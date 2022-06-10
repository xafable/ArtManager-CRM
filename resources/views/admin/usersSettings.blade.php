@extends('admin.adminLayout')


@section('adminContent')


    <div class="container">
        @foreach(array_chunk($users, 3,true) as $chunk)

        <div class="row">


            @foreach($chunk as $id=>$name)

            <div class="col mt-2">

                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $name }}</h5>
                        <a href="{{ route('admin.editUser',$id) }}" class="btn btn-outline-secondary">Редактировать</a>
                    </div>
                </div>

            </div>

            @endforeach
        </div>


        @endforeach
    </div>








@endsection
