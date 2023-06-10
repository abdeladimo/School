<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InscriptionRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'montant'=>'required',
            'versement'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'montant.required' => 'le champ montant est obligatoire',
            'versement.required' => 'le champ versement est obligatoire'
        ];
    }
}
