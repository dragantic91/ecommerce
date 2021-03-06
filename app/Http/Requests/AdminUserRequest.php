<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 01-Dec-17
 * Time: 13:55
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

class AdminUserRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $validation['first_name'] = 'required|max:255';
        $validation['last_name'] = 'required|max:255';

        if ($this->getMethod() == 'POST') {
            $validation['email'] = 'required|email|max:255|unique:admin_users';
            $validation['password'] = 'required|min:6|confirmed';
        }

        return $validation;
    }
}