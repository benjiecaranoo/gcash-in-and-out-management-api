<?php

namespace App\Support;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

trait ReturnResponse
{
    public function respondWithToken(string $token, User $user, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => now()->addMinutes(config('jwt.ttl')),
                'user' => $user,
            ],
        ], $statusCode)->header('Authorization', $token);
    }

    public function respondWithError(string $errorCode, int $statusCode = 400, ?string $message = null, array $metadata = []): JsonResponse
    {
        $payload = [
            'message' => $message,
            'error_code' => $errorCode,
        ];

        if (filled($metadata)) {
            $payload = array_merge($payload, ['meta' => $metadata]);
        }

        return response()->json($payload, $statusCode);
    }

    public function respondWithEmptyData($statusCode = 200)
    {
        return response()->json([], $statusCode);
    }

    public function respondWithResource(JsonResource $resource, $statusCode = 200): JsonResponse
    {
        return response()->json([
            'data' => $resource,
        ], $statusCode);
    }

    public function respondWithData(mixed $data = [], int $statusCode = 200): JsonResponse
    {
        return response()->json([
            'data' => $data,
        ], $statusCode);
    }
}
