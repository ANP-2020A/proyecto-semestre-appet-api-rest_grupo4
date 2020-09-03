<?php
namespace App\Http\Controllers;

use App\User;
use App\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Resources\User as UserResource;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials))
            {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        return response()->json(compact('token'));
    }
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'idCard' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'locate' => 'required|string|max:255',
            'phone' => 'required|string|max:10',
            'userType' => 'required|string|max:25',
            'registrationDate'=>'required|date|max:25',
            'password' => 'required|string|min:6|confirmed',
            'service' => 'required|string',

        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $provider =Provider::create([
            'service'=> $request->get('service'),
        ]);

        $provider->user()->create([
            'name' => $request->get('name'),
            'lastName' => $request->get('lastName'),
            'idCard' => $request->get('idCard'),
            'email' => $request->get('email'),
            'locate' => $request->get('locate'),
            'phone' => $request->get('phone'),
            'userType' => $request->get('userType'),
            'registrationDate'=>$request->get('registrationDate'),
            'password' => Hash::make($request->get('password')),
        ]);

        $user =$provider->user;
        $token = JWTAuth::fromUser($provider->user);

        return response()->json(new UserResource($user, $token),201);
    }
    public function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate())
            {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(new UserResource ($user), 200);
    }
}
