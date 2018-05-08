<?php

namespace App\Http\Controllers;

use App\User as User;
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
    public function edit()
    {
        $user = User::find(Auth::user()->id);
        $data = request()->all();

        $user->id = Auth::user()->id;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->save();

        return redirect()->action('ProfileController@show')->with('status', 'Usuari Modificat Correctament!');
    }

}
