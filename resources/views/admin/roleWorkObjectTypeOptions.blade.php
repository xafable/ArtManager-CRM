@extends('admin.roleOptionsLayout')




@section('options')


        <div class="container">
        <button class="btn btn-warning" type="submit" onclick="rWoTypeOptSelectAllFields()">Показывать все поля</button>
        <input hidden name="workObjectTypeId" value="{{ $workObjectType->id }}">
        <input hidden name="updateAllFields" value="1">
        <input hidden name="roleId" value="{{$roleId}}">
        </div>
        <br>



    <form  method="POST" action="{{ route('admin.updateRoleWOTypeOptions') }}">
        @csrf


        <div id="mainContainer" class="container">
            <input hidden name="workObjectTypeId" value="{{ $workObjectType->id }}">
            <input hidden name="roleId" value="{{$roleId}}">

            <div  class="form-check form-switch">
                <input hidden name="showTypeObjects" value="0">
                <input name="showTypeObjects" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{ $isGrantedObjectsWoType ? 'checked' : '' }}>
                <label class="form-check-label" for="flexSwitchCheckChecked">Просмотр объектов по этому шаблону</label>
            </div>
            <hr>

            <div id="fieldParams" >


                @foreach($typeFields as $typeField)

                    <div  class="input-group mb-3">
                        <input param="input" value="{{ $typeField->title_ru  }}" type="text" class="form-control"  required readonly>
                        <p>&ensp;</p>

                        <div  class="form-check form-switch">
                            <input name="fieldsIds[{{ $typeField->id  }}]" value="0" hidden  >
                            <input data-field="1" name="fieldsIds[{{ $typeField->id  }}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" {{    $grantedFields->contains($typeField->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="flexSwitchCheckChecked">Показывать</label>
                        </div>


                    </div>

                @endforeach

            </div>
            <button  id="objectTypeUpdateButton" class="btn btn-outline-secondary" type="submit" >Сохранить</button>


        </div>
    </form>





@endsection
