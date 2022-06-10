@extends('admin.adminLayout')



@section('adminContent')

    <div class="container">
        <form method="POST" action="{{ route('admin.userUpdate') }}">
            @csrf
         <input name="userId" value="{{ $user->id }}" hidden="hidden">
        <section style="background-color: #eee;">
            <div class="container py-5">


                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">
                                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-chat/ava3.png" alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                <h5 class="my-3">{{ $user->fio }}</h5>

                                <div class="d-flex justify-content-center mb-2">

                                </div>
                            </div>
                        </div>

                        <div class="card mb-4 mb-lg-0">

                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->fio }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Telegram ID</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $user->telegram_chat_id }}</p>
                                    </div>
                                </div>
                                <hr>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4 mb-md-0">
                                    <div class="card-body">
                                        <p class="mb-4"><span class="text-primary font-italic me-1"></span> Доступные роли</p>
                                        @foreach($roles as $role)
                                        <div class="form-check">
                                            <input {{    $allowedRoles->contains($role->id) ? 'checked' : '' }}  name="allowedRoles[]" class="form-check-input" type="checkbox" value="{{ $role->id }}" id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{ $role->name }}
                                            </label>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <button  id="enumUpdateButton" class="btn btn-outline-secondary" type="submit" >Сохранить</button>

            </div>

        </section>

        </form>
    </div>

@endsection
