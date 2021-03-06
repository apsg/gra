<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SuggestionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text' => 'required|string',
        ];
    }
}
