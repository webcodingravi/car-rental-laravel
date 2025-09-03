<?php

namespace App\Http\Controllers;

use App\Mail\forgotPasswordEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\password;

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
        $user->remember_token = Str::random(30);
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

        $remember_me = !empty($request->remember_me ) ? true :false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password],$remember_me)) {
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



    // forgot password

    public function forgotPassword(Request $request) {
     $user = User::where('email',$request->email)->first();
     if(!empty($user)) {

        Mail::to($user->email)->send(new forgotPasswordEmail($user));

        return redirect()->back()->with('success','Please check your email and reset your password');


     }else{
        return redirect()->back()->with('error','Email Not Found in the system');

     }



    }


    // reset password

    public function resetPassword(string $token) {
      $user = User::where('remember_token',$token)->first();
      if(!empty($user)) {
         return view('auth.resetPassword',compact('user'));
      }else{
        abort(404);
      }
    }


    public function processResetPassword(Request $request, $token) {
         if($request->password == $request->confirm_password) {
            $user = User::where('remember_token',$token)->first();
            if(!empty($user)) {
                 $user->password = Hash::make($request->password);
                 $user->remember_token = Str::random(30);
                 $user->email_verified_at = date('Y-m-d H:i:s');
                 $user->save();
            }else{
               return redirect()->back()->with('error','remember token not found');
            }
            return redirect()->route('home')->with('success','Password Successfully Reset');
         }else{
            return redirect()->back()->with('error','Password and confirm password does not Match');
         }
    }


}