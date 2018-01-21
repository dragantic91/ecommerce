<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 21-Jan-18
 * Time: 13:57
 */

namespace App\Http\Requests;


use Illuminate\Foundation\Http\FormRequest;

class ResetPasswordRequest extends FormRequest
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

        $validation['password'] = 'confirmed|required|min:6';
        $validation['password_confirmation'] = 'required|min:6';

        return $validation;
    }

    public function messages()
    {
        return [
            'password.confirmed' => 'Die Passwortbestätigung stimmt nicht überein.',
            'password.min' => 'Das :attribute muss mindestens 6 Zeichen enthalten.',
            'password_confirmation.min' => 'Die :attribute muss mindestens 6 Zeichen enthalten.'
        ];
    }
}