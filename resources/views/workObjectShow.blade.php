@extends('workLayout')

@section('content')



    <div class="container">
        <div class="row">
            <div class="col-xs-auto col-md-3">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button {{ request()->routeIs('object.showByFilter') ? "" : "collapsed" }}  " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                Фильтр по шаблонам
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse {{ request()->routeIs('object.showByFilter') ? "show" : "" }}" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <button onclick="location.href = '{{ route('object.show') }}'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >Все</button>
                                <br>
                                @foreach($types as $type)
                                    <button onclick="location.href = '{{ route('object.showByType',$type->id) }}'" id="objectTypeEditButton" class="btn btn-outline-secondary mt-1" type="button" >
                                        {{ $type->title }}</button>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button {{ request()->routeIs('object.showByFilter') ? "" : "collapsed" }} " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Фильтр по полям
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse {{ request()->routeIs('object.showByFilter') ? "show" : "" }}" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">



                                <form name="filters" method="get" action="{{ route('object.showByFilter') }}" style="width: 90%;margin: 30px;">
                                    <p >Для расширеного фильтра выберите шаблон объекта</p>
                                    <label for="exampleInputEmail1" class="form-label">Имя</label><br>
                                    <input name="filters[title]" type="text"  id="exampleInputEmail1"
                                           @if(request()->has('filters'))
                                           value = "{{ request()->filters['title']  ?? ''  }}"
                                           @else
                                           value = " "
                                        @endif>

                                    <label for="exampleInputEmail1" class="form-label">Описание</label>
                                    <input name="filters[description]" type="text"  id="exampleInputEmail1"
                                           @if(request()->has('filters'))
                                           value = "{{ request()->filters['description'] ?? '' }}"
                                           @else
                                           value = " "
                                        @endif >

                                    @isset($typeFields)
                                        @isset($workObjectTypeId)

                                        <input hidden name="workObjectTypeId" value="{{ $workObjectTypeId ?? 0 }}" type="text"  id="exampleInputEmail1" >
                                        @foreach ($typeFields as $typeField)
                                                <hr>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">{{ $typeField->title_ru }}</label><br>


                                                @if($typeField->format == 'boolean')
                                                    <input name="attributeFilters[{{ $typeField->title_eng }}]" value="0" hidden>
                                                @endif

                                                @if($typeField->format == 'enum')
                                                    <select name="attributeFilters[{{ $typeField->title_eng }}]" class="form-select" aria-label="Default select example">
                                                        <option value="" ></option>
                                                        @foreach($enumerationsData[$typeField->enumeration_id] as $enum)

                                                            <option {{ request()->has('attributeFilters')  ? request()->attributeFilters[$typeField->title_eng] == $enum->value ? 'selected' : '' : '' }}
                                                                    value="{{ $enum->value }}" >{{ $enum->value }}</option>
                                                        @endforeach
                                                    </select>
                                                @elseif($typeField->format == 'date')
                                                    <input name="attributeFilters[{{ $typeField->title_eng }}]" type= "date" value="{{ request()->has('attributeFilters')  ? request()->attributeFilters[$typeField->title_eng] ?? '' : '' }}" >
                                                @elseif($typeField->format == 'boolean')
                                                    <input name="attributeFilters[{{ $typeField->title_eng }}]" type= "checkbox" value="1"{{ request()->has('attributeFilters')  ? request()->attributeFilters[$typeField->title_eng] == 1 ? 'checked' : '' : '' }} >
                                                @elseif($typeField->format == 'integer')
                                                    <input name="attributeFilters[{{ $typeField->title_eng }}]" type= "number" value="{{ request()->has('attributeFilters')  ? request()->attributeFilters[$typeField->title_eng] ?? '' : '' }}" >
                                                @else
                                                    <input name="attributeFilters[{{ $typeField->title_eng }}]" type= "text" value="{{ request()->has('attributeFilters')  ? request()->attributeFilters[$typeField->title_eng] ?? '' : '' }}" >

                                                @endif

                                            </div>
                                        @endforeach
                                     @endisset
                                    @endisset
                                    <button type="submit" class="btn btn-primary mt-2">Поиск</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xs-auto col-md-9">
                    <p>
                        <button class="btn btn-primary mt-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Добавить объект
                        </button>
                    </p>
                    <br>
                    <div class="collapse" id="collapseExample">
                        <form action="{{ route('object.insert') }}" method="POST" id="workObjectTypeCreateForm">
                            @csrf
                            <div class="card card-body">
                                <div class="input-group mb-3">
                                    <select name="type_id" class="form-select" id="inputGroupSelect01" required>
                                        @foreach($types as $type)
                                            <option  value="{{$type->id}}">{{$type->title}}</option>
                                        @endforeach
                                    </select>
                                    <input required name="title" type="text" class="form-control" placeholder="Имя объекта" aria-describedby="button-addon2">
                                    <button id="objectTypeNextButton" class="btn btn-outline-secondary" type="submit" >Далее</button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>

                    @foreach($workObjects as $workObject)
                        <div class="card text-dark bg-light mb-3" >
                            <div class="card-header">{{ $workObject->title }}</div>
                            <div class="card-body">
                                <h5 class="card-title"></h5>
                                <p class="card-text">{{ $workObject->description }}</p>
                                <button onclick="location.href = '{{ route('object.edit',$workObject->id) }}'" id="objectTypeEditButton" class="btn btn-outline-secondary" type="button" >К объекту</button>
                            </div>
                        </div>
                    @endforeach

                {{ $workObjects->withQueryString()->links() }}   </div>
        </div>
    </div>





@endsection



