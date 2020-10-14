<?php

namespace App\Http\Controllers;

use App\Http\Requests\InfoRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function indexRegister()
    {
        return view('login.register');
    }

    public function storeRegister(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->issue_number = $request->issue_number;
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('login.index');
    }

    public function indexLogin()
    {
        return view('login.login');
    }

    public function storeLogin(Request $request)
    {
        $data = [
            'phone' => $request->phone,
            'password' => $request->password,
        ];

        if (!Auth::attempt($data)) {
            return back();
        }
        $user = User::where('id',Auth::user()->id)->first();
        if ($user->role == '1'){
            return redirect()->route('trip.index');
        } elseif ($user->role == '2'){
            return redirect()->route('admin.index');
        }
    }

    public function indexInfo()
    {
        $user = User::where('id',Auth::user()->id)->first();
        return view('info.info',compact('user'));
    }

    public function editInfo()
    {
        $user = User::where('id',Auth::user()->id)->first();
        return view('info.edit-info',compact('user'));
    }

    public function updateInfo(InfoRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name_update;
        $user->phone = $request->phone_update;
        $user->address = $request->address_update;
        $user->issue_number = $request->issue_number_update;
        $user->save();

        return redirect()->route('info.index');
    }

    public function editPassword()
    {
        $user = User::where('id',Auth::user()->id)->first();
        return view('info.edit-password',compact('user'));
    }

    public function updatePassword(PasswordRequest $request)
    {
        $user = User::find(Auth::user()->id);
        $user->pass = $request->new_password;
        $user->save();

        return redirect()->route('info.index');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}
