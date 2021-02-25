<?php


namespace App\Http\Controllers\Auth;


use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController
{
    /**
     * Redirect user to register page
     */
    public function index() {
        if (Auth::check()) {
            return redirect()->route('/');
        }
        return view('auth.register');
    }

    /**
     * Register user in the system
     *
     * @param StoreUserRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function register(StoreUserRequest $request) {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect(route('vacancy.index'));
    }

}
