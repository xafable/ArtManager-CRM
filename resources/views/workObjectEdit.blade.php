@extends('main.workObjectLayot')

@section('workObjectSection')





    <div class="container" >

        <form method="POST" action="{{ route('object.updateStatus') }}">
            @csrf
            <input name="workObjectId" type="text" value="{{ $workObject->id }}" hidden>
            <select onchange="this.form.submit()" name="statusId" class="form-select" aria-label="Default select example">
        @foreach($statuses as $status)
            <option value="{{ $status->status_id }}" {{ $workObject->status_id == $status->status_id ? 'selected' : '' }}>{{ $status->title }}</option>
        @endforeach
    </select>
        </form>

    <hr>



    @if(Route::is('object.edit') )
        @can('update workObject')

                <button onclick="enableEditWorkObject(this)" type="submit" class="btn btn-outline-primary">Редактировать</button>

        @endcan
    @endif

    </div>




    <fieldset id="workObjectFieldset" >

    <div class="container mt-4" >
        <form id="workObjectEditForm" method="POST" action="{{ route('object.update') }}">
            <input name="workObject_id" type="text" value="{{ $workObject->id }}" hidden>
            @csrf

    @foreach($attributes as $attribute)
                @can('view field'.$attribute->type_field_id)

        <div class="input-group mb-3 ">
            <span class="input-group-text" id="basic-addon1">{{ $attribute->title_ru }}</span>
            <input name="attribute_id[]" type="text" value="{{ $attribute->id }}" hidden>

            @if ($attribute->format == 'string')
                <input disabled data-attribute name="value[{{ $attribute->id }}]" type="text" value="{{ $attribute->getValue()}}" class="form-control"  aria-describedby="basic-addon1">
            @elseif ($attribute->format == 'integer')
                <input disabled data-attribute name="value[{{ $attribute->id }}]" type="number" value="{{ $attribute->getValue()}}" class="form-control"  aria-describedby="basic-addon1">
            @elseif ($attribute->format == 'date')
                <input disabled data-attribute name="value[{{ $attribute->id }}]" type="date" value="{{ $attribute->getHtmlDate()}}" class="form-control"  aria-describedby="basic-addon1">
            @elseif ($attribute->format == 'coordinates')
                <input disabled data-attribute name="value[{{ $attribute->id }}]" type="text" value="{{ $attribute->getValue()}}" class="form-control"  aria-describedby="basic-addon1">

                <a target="_blank" rel="noopener noreferrer" id="coordinateButton" class="btn btn-outline-primary" href="https://maps.google.com?q={{ $attribute->getValue() }}" role="button">Карта</a>
            @elseif ($attribute->format == 'boolean')
                <input  data-attribute value="0" name="value[{{ $attribute->id }}]" type="number" hidden>

                <div class="form-check form-switch px-5 mt-1">

                    <input disabled data-attribute {{ $attribute->getValue() == 1 ? 'checked' : '' }}  value="1" name="value[{{ $attribute->id }}]" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">

                </div>
            @elseif($attribute->format == 'enum')
                <select disabled data-attribute name="value[{{ $attribute->id }}]" class="form-select" aria-label="Default select example">
                    @foreach($enumerationsData[$attribute->enumeration_id] as $enum)
                        <option value="{{ $enum->value }}" {{ $attribute->getValue() == $enum->value ? 'selected' : '' }}>{{ $enum->value }}</option>
                    @endforeach
                </select>

            @endif

        </div>
                @endcan
    @endforeach

            <div class="input-group">
                <span class="input-group-text">Описание</span>
                <textarea disabled data-attribute name="description" class="form-control" aria-label="With textarea">{{$workObject->description}}</textarea>
            </div>

            <br>
{{--            <button hidden  id="objectUpdateButton" class="btn btn-outline-secondary" type="submit" >Сохранить</button>--}}







        </form>
        <button hidden id="objectUpdateButton" onclick="submitWorkObject()" class="btn btn-primary">Сохранить</button>


        <!-- Button trigger modal -->
        <button hidden id="objectDeleteButton" type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#exampleModal">
            Удалить
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       Подтвердите удаление
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                        <button onclick="document.delForm.submit();" type="submit" class="btn btn-danger">Удалить</button>
                    </div>
                </div>
            </div>
        </div>


    </div>

        <div class="d-flex justify-content-end">
            <form name="delForm" method="POST" action="{{ route('object.delete') }}">
                @csrf
                <input name="workObject_id" value="{{ $workObject->id }}" hidden>
            </form>
        </div>
    </fieldset>

@endsection
