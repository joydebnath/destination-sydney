<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchProductRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'state' => 'string|nullable',
            'category' => 'string|nullable',
            'region' => 'string|nullable',
            'regionId' => 'string|nullable',
            'suburb' => 'string|nullable',
            'suburbId' => 'string|nullable',
            'area' => 'string|nullable',
            'areaId' => 'string|nullable',
        ];
    }
}
