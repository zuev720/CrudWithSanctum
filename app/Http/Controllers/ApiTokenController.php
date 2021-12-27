<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApiTokenRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ApiTokenController extends Controller
{
    public function createToken(ApiTokenRequest $request) {
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response('Такого пользователя не существует', 401);
        }
        return ['token' => $user->createToken($request->email)->plainTextToken];
    }
}
