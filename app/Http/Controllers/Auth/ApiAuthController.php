<?php

namespace App\Http\Controllers\Auth;



use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ApiAuthController
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'string',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|alpha_dash'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response('Conta criada com sucesso', 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|alpha_dash'
        ]);

        $user = User::where('email', $request->email)->firstOrFail();
        
        if (Hash::check($request->password, $user->password)) {
            return response(['user_info' => [
                'username' => $user->name,
                'token' => $user->createToken('api-token')->plainTextToken
            ]]);
        } else {
            return response('Credenciais Inválidas', 401);
        }
    }
}
