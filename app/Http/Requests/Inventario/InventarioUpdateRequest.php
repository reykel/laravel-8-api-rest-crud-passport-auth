<?php

namespace App\Http\Requests\Inventario;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class InventarioUpdateRequest extends FormRequest
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
            'ubicacion' => 'sometimes|required|max:255',
            'cantidad'=> 'sometimes|required|integer',
            'instrumento_id' => 'sometimes|required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'ubicacion.required' => 'A location is required',
            'ubicacion.max' => 'Max length of ubicacion is 255',

            'cantidad.required' => 'A quantity is required',
            'cantidad.integer' => 'Quantity must be an integer value',

            'instrumento_id.required' => 'A Instrument ID is required',
            'cantidad.integer' => 'Instrument ID must be an integer value',
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

