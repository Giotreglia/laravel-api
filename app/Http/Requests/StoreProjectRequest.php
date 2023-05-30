<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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

            'title' => 'required|max:255',
            'description' => 'nullable|max:65535',
            'image' => 'nullable|image|max:1024',
            'client' => 'nullable|max:30',
            'slug' => 'nullable',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id',

    ];
}

public function messages()
    {
        return [

                'title.required' => 'Il titolo è obbligatorio',
                'title.max' => 'La lunghezza massima è di 255 caratteri',
                'description.max' => 'La lunghezza massima è di 65535 caratteri',
                'image.url' => 'Il valore inserito non è un URL valida. Inserire URL valida, es. https://ilmiosito.com',
                'image.max' => 'La lunghezza massima è di 255 caratteri',
                'client.max' => 'La lunghezza massima è di 30 caratteri',
                'technologies.exists' => 'Tecnologia selezionata non esistente'

        ];
    }
}
