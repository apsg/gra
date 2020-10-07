<?php
namespace App\Domains\Missions\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMissionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title'   => 'required|string|min:3',
            'image'   => 'required|file|image|max:4096',
            'answers' => 'json',
        ];
    }

    public function answers() : array
    {
        return json_decode($this->input('answers', '[]'));
    }
}
