<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
{
    private string $coverPath;
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
            'name' => ['required','min:3'],
            'cover' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=> 'O titulo é obrigatorio.',
            'name.min'=> 'O titulo deve ter no minimo :min letras.',
            'cover.image'=> 'Somente imagens são permitidas.',
            'cover.mimes'=> 'Somente imagens do tipo: jpeg, png, jpg e gif.',
            'cover.max'=> 'Imagem muito grande, valor maximo de 2048.',
        ];
    }

    public function setCoverPath(string $coverPath): void
    {
        $this->coverPath = $coverPath;
    }
    
    public function getCoverPath(): string
    {
        return $this->coverPath;
    }
}
