@extends('admin.roleOptionsLayout')




@section('options')


    <div class="container">


        <form method="POST" action="{{ route('admin.updateRoleGeneralOptions') }}">

            @csrf
            <input name="roleId" value="{{ $roleId }}" hidden="hidden">

            <br>
        <h3><span class="badge bg-secondary">Объекты</span></h3>

            <input name="workObject[{{$workObjectPerm['create workObject']}}]" value="0" hidden="hidden">
            <input name="workObject[{{$workObjectPerm['update workObject']}}]" value="0" hidden="hidden">
            <input name="workObject[{{$workObjectPerm['delete workObject']}}]" value="0" hidden="hidden">
            <input name="workObject[{{$workObjectPerm['view workObject']}}]" value="0" hidden="hidden">


            <div class="row">
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObject[{{$workObjectPerm['create workObject']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{    $grantedPermissions->contains($workObjectPerm['create workObject']) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Создание</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObject[{{$workObjectPerm['update workObject']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{    $grantedPermissions->contains($workObjectPerm['update workObject']) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Обновление</label>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObject[{{$workObjectPerm['delete workObject']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{    $grantedPermissions->contains($workObjectPerm['delete workObject']) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Удаление</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObject[{{$workObjectPerm['view workObject']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{    $grantedPermissions->contains($workObjectPerm['view workObject']) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Просмотр</label>
                </div>
            </div>
        </div>



        <br>
        <h3><span class="badge bg-secondary">Шаблоны</span></h3>
            <input name="workObjectType[{{$workObjectTypePerm['create workObjectType']}}]" value="0" hidden="hidden">
            <input name="workObjectType[{{$workObjectTypePerm['update workObjectType']}}]" value="0" hidden="hidden">
            <input name="workObjectType[{{$workObjectTypePerm['delete workObjectType']}}]" value="0" hidden="hidden">
            <input name="workObjectType[{{$workObjectTypePerm['view workObjectType']}}]" value="0" hidden="hidden">
        <div class="row">
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObjectType[{{$workObjectTypePerm['create workObjectType']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{    $grantedPermissions->contains($workObjectTypePerm['create workObjectType']) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Создание</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObjectType[{{$workObjectTypePerm['update workObjectType']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{    $grantedPermissions->contains($workObjectTypePerm['update workObjectType']) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Обновление</label>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObjectType[{{$workObjectTypePerm['delete workObjectType']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{    $grantedPermissions->contains($workObjectTypePerm['delete workObjectType']) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Удаление</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check form-switch">
                    <input name="workObjectType[{{$workObjectTypePerm['view workObjectType']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{    $grantedPermissions->contains($workObjectTypePerm['view workObjectType']) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Просмотр</label>
                </div>
            </div>
        </div>

        <br>
        <h3><span class="badge bg-secondary">Типы статусов</span></h3>
            <input name="statusType[{{$statusTypePerm['create statusType']}}]" value="0" hidden="hidden">
            <input name="statusType[{{$statusTypePerm['update statusType']}}]" value="0" hidden="hidden">
            <input name="statusType[{{$statusTypePerm['delete statusType']}}]" value="0" hidden="hidden">
            <input name="statusType[{{$statusTypePerm['view statusType']}}]" value="0" hidden="hidden">
        <div class="row">
            <div class="col">
                <div class="form-check form-switch">
                    <input name="statusType[{{$statusTypePerm['create statusType']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{    $grantedPermissions->contains($statusTypePerm['create statusType']) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Создание</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check form-switch">
                    <input name="statusType[{{$statusTypePerm['update statusType']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"  {{    $grantedPermissions->contains($statusTypePerm['update statusType']) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Обновление</label>
                </div>
            </div>
        </div>

        <br>
        <div class="row">
            <div class="col">
                <div class="form-check form-switch">
                    <input name="statusType[{{$statusTypePerm['delete statusType']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"  {{    $grantedPermissions->contains($statusTypePerm['delete statusType']) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Удаление</label>
                </div>
            </div>
            <div class="col">
                <div class="form-check form-switch">
                    <input name="statusType[{{$statusTypePerm['view statusType']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault"  {{    $grantedPermissions->contains($statusTypePerm['view statusType']) ? 'checked' : '' }}>
                    <label class="form-check-label" for="flexSwitchCheckDefault">Просмотр</label>
                </div>
            </div>
        </div>

            <br>
            <h3><span class="badge bg-secondary">Дополнительные атрибуты</span></h3>
            <input name="additionalAttribute[{{$additionalAttributePerm['create additionalAttribute']}}]" value="0" hidden="hidden">
            <input name="additionalAttribute[{{$additionalAttributePerm['update additionalAttribute']}}]" value="0" hidden="hidden">
            <input name="additionalAttribute[{{$additionalAttributePerm['delete additionalAttribute']}}]" value="0" hidden="hidden">
            <input name="additionalAttribute[{{$additionalAttributePerm['view additionalAttribute']}}]" value="0" hidden="hidden">
            <div class="row">
                <div class="col">
                    <div class="form-check form-switch">
                        <input name="additionalAttribute[{{$additionalAttributePerm['create additionalAttribute']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{    $grantedPermissions->contains($additionalAttributePerm['create additionalAttribute']) ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Создание</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check form-switch">
                        <input name="additionalAttribute[{{$additionalAttributePerm['update additionalAttribute']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{    $grantedPermissions->contains($additionalAttributePerm['update additionalAttribute']) ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Обновление</label>
                    </div>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col">
                    <div class="form-check form-switch">
                        <input name="additionalAttribute[{{$additionalAttributePerm['delete additionalAttribute']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{    $grantedPermissions->contains($additionalAttributePerm['delete additionalAttribute']) ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Удаление</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-check form-switch">
                        <input name="additionalAttribute[{{$additionalAttributePerm['view additionalAttribute']}}]" value="1" class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" {{    $grantedPermissions->contains($additionalAttributePerm['view additionalAttribute']) ? 'checked' : '' }}>
                        <label class="form-check-label" for="flexSwitchCheckDefault">Просмотр</label>
                    </div>
                </div>
            </div>

            <br>
            <button  id="objectTypeUpdateButton" class="btn btn-outline-secondary" type="submit" >Сохранить</button>

        </form>

    </div>





@endsection



