<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RendezvousStore extends FormRequest
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
            'nom' => 'required',
            'prenom' => 'required',
            'telephone' => 'required',
            'email' => 'required|email',
            'date' => 'required|date',
            'heure' => 'required',
            'commentaire' => 'required',
            //'statut' => 'sometimes'
        ];
    }
    public function messages()
    {
        return [
            'nom.required' => 'Votre nom ne peut pas être vide',
            'prenom.required' => 'required',
            'telephone.required' => 'required',
            'email.required' => 'required|email',
            'date.required' => 'required|date',
            'heure.required' => 'required',
            'commentair.reequired' => 'required',
            //'statut' => 'sometimes'
        ];
    }
}
