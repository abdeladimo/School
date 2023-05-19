<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SeanceRequest extends FormRequest
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
        $days = [
            'mon',
            'tue',
            'wed',
            'thu',
            'fri',
            'sat',
            'sun',
        ];
        return [
            'time_begin' => [
                'required',
                'date_format:H:i',
            ],
            'time_end' => [
                'required',
                'date_format:H:i',
            ],
            'day' => [
                'required',
                'string',
                Rule::in($days),
            ],
            'prof' => [
                'required',
                'numeric',
                'exists:App\Models\Prof,id',
            ],
            'classe' => [
                'required',
                'numeric',
                'exists:App\Models\Classe,id',
            ],
            'room' => [
                'required',
                'numeric',
                'exists:App\Models\Salle,id',
            ],
        ];
    }
}
