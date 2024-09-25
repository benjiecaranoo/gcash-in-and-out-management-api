<?php

namespace App\Http\Controllers\Auth;

use App\Enums\ErrorCodes;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Laravel\Sanctum\NewAccessToken;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return $this->respondWithError('INVALID_CREDENTIALS', Response::HTTP_UNAUTHORIZED);
        }

        if (!$user || !Hash::check($request->password, $user->password)) {
            return $this->respondWithError(ErrorCodes::INVALID_CREDENTIALS, Response::HTTP_UNAUTHORIZED);
        }

        /** @var $newAccessToken NewAccessToken */
        $newAccessToken = $user->createToken($request->header('user-agent'));

        return $this->respondWithToken($newAccessToken->plainTextToken, UserResource::make($user), Response::HTTP_OK);
    }

    public function me(Request $request): UserResource
    {
        return new UserResource(auth()->user());
    }

    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
