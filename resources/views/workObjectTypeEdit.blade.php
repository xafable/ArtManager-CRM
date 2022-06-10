@extends('workLayout')

@section('content')

    @if($workObjectsCount > 0)
        <div class="container">
            <div class="alert alert-danger" role="alert">
                Есть созданные объекты по шаблону. Редактирование запрещено!
            </div>
        </div>
    @endif

    <form id="workObjectTypeEditForm" method="POST" action="{{ route('object.model.update') }}">
        @if($workObjectsCount > 0)
            <fieldset  disabled="disabled">
                @else
                    <fieldset >
                        @endif

                        @csrf
                        <div id="mainContainer" class="container">
                            <input hidden name="workObjectTypeId" value="{{ $workObjectType->id }}">
                            <button onclick="addFieldToWorkObjectType(this)"  id="objectTypeNextButton" class="btn btn-outline-secondary" type="button" >Добавить поле</button>
                            <br>

                            <div id="fieldParams">

                                <br>

                                <select param="select" name="statusType" class="form-select" id="inputGroupSelect01" required>
                                    @foreach($statusTypes as $statusType)
                                        <option value="{{$statusType->id}}" {{ $statusType->id==$typeSettings->status_type_id ? 'selected' : ''  }}>{{$statusType->title}}</option>
                                    @endforeach
                                </select>
                                <hr>

                                @forelse($typeFields as $typeField)

                                    <div class="shadow p-3 mb-5 bg-body rounded mt-2" id="fieldParam{{ $typeField->id }}" >

                                        <div class="row">

                                            <div class="col">
                                                <input   name="fieldParams[{{ $loop->index }}][title]" value="{{ $typeField->title_ru  }}" type="text" class="form-control"  required >
                                            </div>
                                            <div class="col">
                                                <input   name="fieldParams[{{ $loop->index }}][quantity]" value="{{ $typeField->pivot->fields_quantity }}" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Количество">
                                            </div>

                                        </div>


                                        <div class="row align-items-center mt-3">
                                            <div class="col">
                                                <select data-typeFieldId="fieldParam{{$typeField->id}}" id="fieldFormatSelector" onchange="fieldFormatOnChange(this)" param="select" name="fieldParams[{{ $loop->index }}][field_format]" class="form-select"  required>
                                                    @foreach($fieldFormats as $fieldFormat)
                                                        <option value="{{$fieldFormat->format}}" {{ $fieldFormat->format==$typeField->format ? 'selected' : ''  }}>{{$fieldFormat->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>



                                            <div class="col ">
                                                <div  class="form-check form-switch" style="margin-right: 30px;">
                                                    <input {{ $typeField->required == 1 ? 'checked' : ''  }} param="input" name="fieldParams[{{ $loop->index }}][required]" value="1"  class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Обьязательное</label>
                                                </div>
                                            </div>



                                        </div>

                                        <div class="row align-items-center mt-3">
                                            <div class="col">
                                                <select id="enumSelector"  param="select" name="fieldParams[{{ $loop->index }}][enumeration_id]" class="form-select" style="{{ $typeField->format == 'enum' ? '' : 'visibility:hidden;' }}"  >
                                                    @foreach($enumerations as $enumeration)
                                                        <option value="{{$enumeration->id}}" {{ $enumeration->id==$typeField->enumeration_id ? 'selected' : ''  }}>{{$enumeration->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <br>
                                        <button class="btn btn-danger" type="button" onClick="deleteFieldFromWorkObjectType(this)" id="remover">Удалить</button>

                                        <input hidden value="{{ $typeField->id }}" name="fieldParams[{{ $loop->index }}][id]">

                                    </div>

                                @empty

                                    <div class=" shadow p-3 mb-5 bg-body rounded mt-2" id="fieldParam_" >

                                        <div class="row">

                                            <div class="col">
                                                <input  name="fieldParams[0][title]" value="" type="text" class="form-control"  required placeholder="Имя">
                                            </div>
                                            <div class="col">
                                                <input name="fieldParams[0][quantity]" value="1" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Количество">
                                            </div>

                                        </div>


                                        <div class="row align-items-center mt-3">
                                            <div class="col">
                                                <select data-typeFieldId="fieldParam_" id="fieldFormatSelector" onchange="fieldFormatOnChange(this)" param="select" name="fieldParams[0][field_format]" class="form-select"  required>
                                                    @foreach($fieldFormats as $fieldFormat)
                                                        <option value="{{$fieldFormat->format}}" selected>{{$fieldFormat->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>



                                            <div class="col ">
                                                <div  class="form-check form-switch" style="margin-right: 30px;">
                                                    <input  param="input" name="fieldParams[0][required]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">Обьязательное</label>
                                                </div>
                                            </div>



                                        </div>

                                        <div class="row align-items-center mt-3">
                                            <div class="col">
                                                <select id="enumSelector" param="select" name="fieldParams[0][enumeration_id]" class="form-select"  >
                                                    @foreach($enumerations as $enumeration)
                                                        <option value="{{$enumeration->id}}" selected>{{$enumeration->title}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <br>
                                        <button class="btn btn-danger" type="button" onClick="deleteFieldFromWorkObjectType(this)" id="remover">Удалить</button>

                                        <input hidden value="0" name="fieldParams[0][id]">

                                    </div>

                                @endforelse

                            </div>

                            <hr>
                            <button  id="objectTypeUpdateButton" class="btn btn-outline-secondary" type="submit" >Сохранить</button>

                            <button type="button" class="btn btn-danger" onclick="document.delForm.submit();">Удалить</button>



                        </div>
                    </fieldset>
    </form>
    <br>

    <form name="delForm" action="{{ route('object.model.delete') }}" method="POST">
        @csrf
        <input  name="delId" value="{{ $workObjectType->id }}" type="number" hidden="hidden">
    </form>




    <div class=" shadow p-3 mb-5 bg-body rounded mt-2" id="paramTemplate" hidden>

        <div class="row">

            <div class="col">
                <input  name="fieldParams[_0_][title]" value="" type="text" class="form-control"  required placeholder="Имя">
            </div>
            <div class="col">
                <input  name="fieldParams[_0_][quantity]" value="1" type="number" class="form-control" id="exampleFormControlInput1" placeholder="Количество">
            </div>

        </div>


        <div class="row align-items-center mt-3">
            <div class="col">
                <select data-typeFieldId="fieldParam_0_" id="fieldFormatSelector" onchange="fieldFormatOnChange(this)" param="select" name="fieldParams[_0_][field_format]" class="form-select"  required>
                    @foreach($fieldFormats as $fieldFormat)
                        <option value="{{$fieldFormat->id}}" selected>{{$fieldFormat->title}}</option>
                    @endforeach
                </select>
            </div>



            <div class="col ">
                <div  class="form-check form-switch" >
                    <input  param="input" name="fieldParams[_0_][required]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                    <label class="form-check-label" for="flexSwitchCheckDefault">Обьязательное</label>
                </div>
            </div>



        </div>

        <div class="row align-items-center mt-3">
            <div class="col">
                <select id="enumSelector" param="select" name="fieldParams[_0_][enumeration_id]" class="form-select"  >
                    @foreach($enumerations as $enumeration)
                        <option value="{{$enumeration->id}}" selected>{{$enumeration->title}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <br>
        <button class="btn btn-danger" type="button" onClick="deleteFieldFromWorkObjectType(this)" id="remover">Удалить</button>

        <input hidden value="0" name="fieldParams[_0_][id]">

    </div>

    {{--
        <div class="container">

            <div id="objectTypeUpdateButton_loadImg" class="spinner-grow spinner-grow-sm" role="status">
                <span  class="visually-hidden">Loading...</span>
            </div>

        </div>--}}
@endsection







