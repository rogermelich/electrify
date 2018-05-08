<?php

namespace App\Http\Controllers;



class UserFormRequest
{
    public function rules()
    {
        // Grab the user id from the URL
        $user_id = \Route::current()->getParameter('users');

        return [
            'name' => 'required',
            'email' => 'unique:users,email,'.$user_id.'|email|required',
        ];
    }


}