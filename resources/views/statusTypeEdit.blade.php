@extends('workLayout')

@section('content')

    @if($workObjectTypesCount > 0)
        <div class="container">
            <div class="alert alert-danger" role="alert">
                Есть созданные шаблоны с данным типом статусов. Редактирование запрещено!
            </div>
        </div>
    @endif

    <form id="statusTypeEditForm" method="POST" action="{{ route('status.update') }}">

        @if($workObjectTypesCount > 0)
            <fieldset disabled="disabled">
        @else
            <fieldset>
        @endif

        @csrf
        <div id="mainContainer" class="container">
            <input hidden name="statusTypeId" value="{{ $statusType->id }}">
            <button onclick="addFieldToStatusType()"  id="objectTypeNextButton" class="btn btn-outline-secondary" type="button" >Добавить поле</button>


            <div id="fieldStatuses" >
                <br>
                @forelse($statuses as $status)

                    <div id="fieldStatus{{ $status->id }}" class="input-group mb-3">
                        <input param="input" hidden value="{{ $status->id }}" name="statuses[{{$loop->index}}][id]">
                        <input param="input" name="statuses[{{$loop->index}}][title]" value="{{ $status->title  }}" type="text" class="form-control" required>
                        <button class="btn btn-danger" type="button" onClick="deleteFieldFromStatusType(this)" id="remover">Удалить</button>


                    </div>


                @empty

                    <div  id="fieldStatus0" class="input-group mb-3">
                        <input param="input" hidden value="0" name="statuses[0][id]">
                        <input param="input" name="statuses[0][title]" value="" type="text" class="form-control" required>
                        <button class="btn btn-danger" type="button" onClick="deleteFieldFromStatusType(this)" id="remover">Удалить</button>

                    </div>

                @endforelse
            </div>

            <button  id="objectStatusUpdateButton" class="btn btn-outline-secondary" type="submit" >Сохранить</button>
            <button type="button" class="btn btn-danger" onclick="document.delForm.submit();">Удалить</button>


        </div>
                </fieldset>
    </form>

    <form name="delForm" action="{{ route('object.model.delete') }}" method="POST">
        @csrf
        <input  name="delId" value="{{ $statusType->id }}" type="number" hidden="hidden">
    </form>
    <br>



    <div  id="fieldTemplate" class="input-group mb-3" hidden>
        <input param="input" hidden value="0" name="statuses[_0_][id]">
        <input param="input" name="statuses[_0_][title]" value="" type="text" class="form-control" required>
        <button class="btn btn-danger" type="button" onClick="deleteFieldFromStatusType(this)" id="remover">Удалить</button>
    </div>


@endsection







