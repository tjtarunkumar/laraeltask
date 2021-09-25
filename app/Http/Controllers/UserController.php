<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function login(Request $request)
    {
        $rules = array(
            'email'=> 'required|email',
            'password' => 'required|min:6|max:13'
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return ["errors" => $validator->errors()];
        }

        $user = User::where('email', $request->email)->first();
        
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['Wrong Email/Password.']
            ], 404);
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'errors' => null,
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }

    function register(Request $request)
    {
        $rules = array(
            'name'=> 'required',
            'email'=> 'required|email|unique:users',
            'password' => 'required|min:6|max:13'
        );
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return ["errors" => $validator->errors()];
        }
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        $response = [
            'errors' => null,
            'user' => $user,
            'msg' => "User Created Sucessfully"
        ];
        return response($response, 201);
    }

    function googleredirect() {
        return Socialite::driver('google')->stateless()->redirect();
    }

    function googlecallback() {
        try {
      
            $user = Socialite::driver('google')->stateless()->user();
            
            $finduser = User::where('email', $user->email)->first();
       
            if($finduser){
                $myuser = User::where('google_id', $user->id)->first();
                
                if(!$myuser){
                    $finduser->google_id = $user->id;
                    $finduser->save();
                }

                $token = $finduser->createToken('my-app-token')->plainTextToken;
      
                return redirect()->to("chat/$token");
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => Hash::make($user->id)
                ]);
      
                $token = $newUser->createToken('my-app-token')->plainTextToken;
      
                return redirect()->to("chat/$token");
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    function facebookredirect() {
        return Socialite::driver('facebook')->redirect();
    }

    function facebookcallback() {
        try {
      
            $user = Socialite::driver('facebook')->user();
            
            $finduser = User::where('email', $user->email)->first();
       
            if($finduser){
                $myuser = User::where('facebook_id', $user->id)->first();
                
                if(!$myuser){
                    $finduser->google_id = $user->id;
                    $finduser->save();
                }

                $token = $finduser->createToken('my-app-token')->plainTextToken;
      
                return redirect()->to("chat/$token");
       
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'password' => Hash::make($user->id)
                ]);
      
                $token = $newUser->createToken('my-app-token')->plainTextToken;
      
                return redirect()->route("chat/$token");
            }
      
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
