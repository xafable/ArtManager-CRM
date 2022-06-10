@extends('main.workObjectLayot')

@section('workObjectSection')


    <div class="container mt-1">

        @can('create additionalAttribute')
        <div class="accordion mb-4" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Добавить атрибут
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="accordion-body">
                        <div  id='fieldCreator'  >

                            <div class="row">
                                <div class="col">
                                    <input id="attributeTitle" value="" type="text" class="form-control"  required placeholder="Имя">
                                </div>
                                <div class="col">
                                    <input id="attributeQuantity" value="1" type="number" class="form-control"  placeholder="Количество">
                                </div>
                            </div>


                            <div class="row align-items-center mt-3">
                                <div class="col">
                                    <div  class="form-check form-switch">
                                        <input id="attributeNumerate" value="0" class="form-check-input" type="checkbox">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Пронумеровать поля</label>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <button class="btn btn-primary" type="button" onClick="addFieldToAdditionalAttribute(this)">Добавить</button>

                        </div>                    </div>
                </div>
            </div>
        </div>

        @endcan



            @can('update additionalAttribute')
            <button onclick="enableEditAdditionalAttributes(this)" type="submit" class="btn btn-outline-primary">Редактировать</button>
            @endcan

            <fieldset id="additionalAttributesFieldset" disabled>

            <form action={{ route('object.additionalAttributes.update') }} method="post" class="mt-4">
            @csrf
            <input name="workObjectId" value="{{ $workObject->id }}" hidden>
            <div id="form" class="form-group">
                @forelse($additionalAttributes as $additionalAttribute)
                <div data-oldAttribute class="input-group mb-3 ">
                    <input value="{{ $additionalAttribute->id }}" name="oldAttribute[{{$loop->index}}][id]" hidden>
                    <span  class="input-group-text" id="basic-addon1">{{ $additionalAttribute->title_ru }}</span>
                    <input value="{{ $additionalAttribute->value }}" name="oldAttribute[{{$loop->index}}][value]" type="text"  class="form-control"  aria-describedby="basic-addon1">

                    @can('delete additionalAttribute')
                    <button data-delete-button data-attribute-id="{{ $additionalAttribute->id }}" class="btn btn-danger" type="button" onClick="deleteFieldFromAdditionalAttribute(this)" hidden>Удалить</button>
                    @endcan
                </div>
                @empty

                @endforelse

            </div>
            <button  id="additionalAttributeUpdateButton" class="btn btn-outline-secondary" type="submit" hidden>Сохранить</button>
        </form>

            </fieldset>


        <div data-newAttribute hidden id="additionalAttributeTemplate" class="input-group mb-3 ">
            <span  class="input-group-text" id="span">Template</span>
            <input value="" id="value" type="text"  class="form-control"  aria-describedby="basic-addon1">
            <input value="" id="title" type="text" hidden="">
            <button class="btn btn-danger" type="button" onClick="deleteFieldFromAdditionalAttribute(this)" id="remover">Удалить</button>
        </div>

    </div>



@endsection
