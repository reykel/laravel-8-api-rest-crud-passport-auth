<?php

namespace App\Http\Requests\Instrumento;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class InstrumentoUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'descripcion' => 'sometimes|required|max:255'
        ];
    }

    public function messages(): array
    {
        return [
            'descripcion.required' => 'A descripcion is required',
            'descripcion.max' => 'Max length of descripcion is 255',
        ];
    }

    protected function failedValidation(Validator $validator){

        throw new HttpResponseException(
            response([
                'error' => $validator->errors(),
                'message' => 'Validation failed on update operation',
                'code' => 422
            ], 422 )
        ); 

    }
}

