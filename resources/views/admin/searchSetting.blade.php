@extends('admin.adminLayout')


@section('adminContent')


                <form method="POST" action="{{ route('admin.updateSearchSettings') }}">
                    @csrf
                <div class="container">
                    @foreach($workObjectTypes as $workObjectType)
                        <h4>{{ $workObjectType->title }}</h4>
                    <ul class="list-group">

                        @foreach($workObjectType->typeFields as $typeField)
                        <li class="list-group-item">
                            <input name="typeFields[{{ $typeField->id }}]" class="form-check-input me-1" type="checkbox" value="{{ $typeField->id }}" aria-label="..." {{ $typeField->searchable == 1 ? 'checked' : '' }}>
                            {{ $typeField->title_ru }}
                        </li>
                        @endforeach

                    </ul>
                    @endforeach

                    <button  id="objectTypeUpdateButton" class="btn btn-outline-secondary" type="submit" >Сохранить</button>
                </div>


                </form>




@endsection
