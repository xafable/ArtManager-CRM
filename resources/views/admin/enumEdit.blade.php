@extends('admin.adminLayout')


@section('adminContent')

    <form class="" id="enumEditForm" method="POST" action="{{ route('admin.updateEnum') }}">
        @csrf
        <div id="mainContainer" class="container">
            <input hidden name="enumId" value="{{ $enumId }}">
            <button onclick="addFieldToEnumEdit()"  id="objectTypeNextButton" class="btn btn-outline-secondary" type="button" >Добавить поле</button>

            <div class="mt-4" id="fieldEnums" >
                @forelse($enumData as $e)

                    <div class="input-group mb-3" id="enumField{{ $e->id }}">
                        <input param="input" hidden value="{{ $e->id }}" name="enum[{{$loop->index}}][id]">
                        <input param="input" name="enum[{{$loop->index}}][value]" value="{{ $e->value  }}" type="text" class="form-control" required>
                        <button class="btn btn-danger" type="button" onClick="deleteFieldFromEnumEdit(this)" id="remover">Удалить</button>


                    </div>

                @empty
                    <div class="input-group mb-3" id="enumField0">
                        <input param="input" hidden value="0" name="enum[0][id]">
                        <input param="input" name="enum[0][value]" value="" type="text" class="form-control" required>
                        <button class="btn btn-danger" type="button" onClick="deleteFieldFromEnumEdit(this)" id="remover">Удалить</button>
                    </div>
                @endforelse
            </div>

            <button  id="enumUpdateButton" class="btn btn-outline-secondary" type="submit" >Сохранить</button>
        </div>
    </form>




    <div id="enumTemplate" class="input-group mb-3" hidden>
        <input param="input" hidden value="0" name="enum[_0_][id]">
        <input param="input" name="enum[_0_][value]" value="" type="text" class="form-control" required>
        <button class="btn btn-danger" type="button" onClick="deleteFieldFromEnumEdit(this)" id="remover">Удалить</button>
    </div>




@endsection
