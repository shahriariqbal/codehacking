<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersEditRequest extends Request
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=> 'required',
            'email' => 'required',
            'role_id'=> 'required',
            'is_active' => 'required',
        
        ];
    }
}
