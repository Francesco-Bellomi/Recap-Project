<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'name'=>'required|min:5|max:80',
            'img'=>'image',
            'price'=>'required',
            'description'=>'required|min:30|max:1000',
            'categories'=>'required'
        ];
    }

    public function messages()
    {

        return[
            'name.required' => 'è necessario inserire il titolo',
            'name.min'=>'il titolo deve avere almeno 5 caratteri',
            'name.max'=>'il titolo deve avere al massimo 80 caratteri',
            'description.required'=> ' è necessario inserire una descrizione',
            'description.min'=>'La descrizione da avere minimo 30 caratteri',
            'descriptio.max'=>'la descrizione deve avere massimo 1000 caratteri',
            'img.image'=> 'Deve essere un\' immagine',
            'categories.required'=>'Seleziona sta categoria per favore che già mi gira la madonna',
            'price.required'=>'il prezzo è obbligatorio'
        ];

    }
}
