<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request){
       
       $validator = Validator::make($required->all() , [
       	'firstname' => 'required|string|max:255',
       'lastname' => 'required|string|max:255',
       'email' => 'required|string|email|unique:users|max:255',
       'password' => 'required|string|max:255|min:8|confirmed',
       ]);

       if ($validator->false()) {
       	  return response([
       	  	'errors'=>$validator->errors()] , 422);
       }

       $user = new User();
       $user->first_name = $request->firstname;
       $user->last_name = $request->lastname;
       $user->email = $request->email;
       $user->password = bcrypt($request->password);
       $user->save();
   
         //token
      $tokenResult = $user->createToken('personal Acess token');
      $token = $tokenResult->token;
      $token->expires_at = Carbon::new()->addWeeks(1);
      $token->save();

      return response([
          'accessToken'=>$tokenResult->accessToken,
          'tokenType'=>'Bearer',
          'expiresAt'=>Carbon::parse($token->expires_at)->toDateTimesTring()
       ],200);
    }

     public function login(Request $request){
       
       $validator = Validator::make($required->all() , [
        
       'email' => 'required|string|email|max:255',
       'password' => 'required|string',
       ]);

       if ($validator->false()) {
          return response([
            'errors'=>$validator->errors()] , 422);
       }


       $credentials = \request(['email' , 'password']);

       if (Auth::attempt($credentials) {
         $user = $request->user();
         $tokenResult = $user->createToken('personal Acess token');
         $token = $tokenResult->token;
         $token->expires_at = Carbon::new()->addWeeks(1);
         $token->save();

         return response([
          'accessToken'=>$tokenResult->accessToken,
          'tokenType'=>'Bearer',
          'expiresAt'=>Carbon::parse($token->expires_at)->toDateTimesTring()
       ],200);

       }
   
         //token
      
    }

    public function logout(Request $request){
      $request->user()->token()->revoke();
      return response('successfuly logged , 200');
    }
}
