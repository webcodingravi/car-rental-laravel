<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //   user register
    public function registerUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'mobile' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ]);
        }

        $user = new User();
        $user->name = trim($request->name);
        $user->email = trim($request->email);
         $user->mobile = trim($request->mobile);
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => true,
            'message' => 'User Register Successfully'
        ]);
    }


    //  user login
    public function loginUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ]);
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return response()->json([
                'status' => true,
                'message' => 'Login Successfully'
            ]);
        } else {
            Auth::logout();
            return response()->json([
                'status' => false,
                'message' => 'Email or Password Not Matched, please Try again'
            ]);
        }
    }

    // logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }



    // list cars owner permision
    public function listCars()
    {
        if (!empty(Auth::check())) {

            $user = User::where('id', Auth::user()->id)->first();
            if ($user == null) {
                return response()->json([
                    'status' => false,
                    'message' => 'User Not Found'
                ]);
            }
            $user->role = 'owner';
            $user->save();
            return response()->json([
                'status' => true,
                'message' => 'You can now list cars.'
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Not Authorized'
            ]);
        }
    }
}