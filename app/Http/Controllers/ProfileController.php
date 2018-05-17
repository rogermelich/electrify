<?php

namespace App\Http\Controllers;

use App\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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

    public function password()
    {
        return view('profile.change');
    }

    public function password_update()
    {
        $this->validate(request(), [
            'password' => 'required|min:6|confirmed',
        ]);

        $user_password = auth()->user()->password;
        $old_password = request('old_password');
        $password = request('password');

        if (\Hash::check($old_password, $user_password)) {

            auth()->user()->update([
                'password' => bcrypt($password)
            ]);

            return redirect()->action('ProfileController@password')->with('status', 'Constrasenya modificada correctament!');

        } else {
            return redirect()->action('ProfileController@password')->with('error', 'Contrasenya actual incorrecta!');
        }
    }

}
