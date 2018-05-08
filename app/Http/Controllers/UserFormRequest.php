<?php

namespace App\Http\Controllers;


class UserFormRequest
{
    public function rules()
    {
        //$user_id = \Route::current()->getParameter('user');

        return [
            'name'     => 'required|max:255',
            'email'    => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'
        ];
    }

}