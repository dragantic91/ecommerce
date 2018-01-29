<?php
/**
 * Created by PhpStorm.
 * User: dragantic91
 * Date: 29-Jan-18
 * Time: 23:21
 */

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest as Request;

class PageRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $validationRule = [];
        $validationRule['name'] = 'required|max:255';
        $validationRule['content'] = 'required';
        if ($this->getMethod() == 'POST') {
            $validationRule['slug'] = 'required|max:255|alpha_dash|unique:pages';
        }
        if ($this->getMethod() == 'PUT') {
            $validationRule['slug'] = 'required|max:255|alpha_dash';
        }

        return $validationRule;
    }
}