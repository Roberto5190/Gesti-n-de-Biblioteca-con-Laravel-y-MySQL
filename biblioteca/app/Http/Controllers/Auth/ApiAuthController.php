<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ApiAuthController extends Controller
{
    /**  POST /api/login  */
    public function login(Request $r)
    {
        $r->validate(['email'=>'required|email', 'password'=>'required']);

        $user = User::where('email', $r->email)->first();

        if (! $user || ! Hash::check($r->password, $user->password)) {
            return response()->json(['message' => 'Credenciales incorrectas'], 401);
        }

        $token = $user->createToken('biblioteca-token')->plainTextToken;
        return response()->json(['token' => $token], 200);
    }

    /**  POST /api/logout  (requiere auth:sanctum) */
    public function logout(Request $r)
    {
        $r->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Sesión cerrada'], 200);
    }

}
