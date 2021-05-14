<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTag extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()//те кто может иметь доступ
    {
        return true;//ставим тру
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()//сохдаем валидацию для категорий
    {
        return [
            'title'=>'required'
        ];
    }
}
