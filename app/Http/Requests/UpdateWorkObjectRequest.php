<?php

namespace App\Http\Requests;


use App\Models\Attribute;
use App\Models\TypeField;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UpdateWorkObjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        if($this->request->has('value')){
            foreach($this->request->get('value') as $key => $val)
            {
                $rules['value.'.$key] = TypeField::query()->withoutGlobalScopes()->find(Attribute::query()->find($key)->type_field_id)->required ? 'required|':''.'max:250';
            }
        }
        return $rules;

    }

    public function attributes()
    {
        $attributes = [];
        if($this->request->has('value')) {
            foreach ($this->request->get('value') as $key => $val) {
                $attributes['value.' . $key] = Attribute::query()->find($key)->title_ru;
            }
        }

        return $attributes;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}
