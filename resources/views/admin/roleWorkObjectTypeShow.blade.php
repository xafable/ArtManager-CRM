@extends('admin.roleOptionsLayout')




@section('options')


    <div class="container">


        @foreach($workObjectTypes as $workObjectType)
            <div class="card text-dark bg-light mb-3" style="width: 100%;">
                <div class="card-header">{{ $workObjectType->title }}</div>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <button onclick="location.href = '{{ route('admin.roleWOTypeOptions',[$roleId,$workObjectType->id]) }}'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >Редактировать</button>

                </div>
            </div>
        @endforeach


    </div>





@endsection



