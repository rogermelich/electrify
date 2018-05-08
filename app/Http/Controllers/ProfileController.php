<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        $id = Auth::user()->id;
        return view('profile.profile')->with('id', $id);
    }
    /**
     * @param $id
     * @return $this
     */
    public function edit($id, UserFormRequest $request)
    {
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->save();

        return \Redirect::route('users.edit', [$user->id])->with('message', 'User has been updated!');
    }

}
