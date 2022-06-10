@extends('admin.adminLayout')



@section('adminContent')



    <p>
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Добавить
        </button>
    </p>
    <div class="collapse" id="collapseExample">
        <form action="{{ route('admin.insertRole') }}" method="POST" id="roleCreateForm">
            @csrf
            <div class="card card-body">
                <div class="input-group mb-3">
                    <input required name="roleTitle" type="text" class="form-control" placeholder="Имя " aria-describedby="button-addon2">
                    <button id="objectTypeNextButton" class="btn btn-outline-secondary" type="submit" > Ок </button>
                </div>
            </div>
        </form>
    </div>







            <div class="row">


                <div class="card mb-4">
                    @foreach($roles as $role)
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">{{ $role->name }}  </p>
                            </div>
                            <div class="col-sm-3">
                              <a href="{{ route('admin.generalOptions',$role->id) }}" class="btn btn-outline-secondary" role="button" >Параметры</a>
                            </div>
                        </div>

                    </div>
                        <hr>
                    @endforeach

                </div>



            </div>












@endsection
