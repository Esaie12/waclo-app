<?php

namespace App\Support;

/**
 * @deprecated Conserve pour compatibilité. Utilisez JwtService.
 */
class ApiTokenManager
{
    public static function create(string $guard, int $userId, int $ttlMinutes = 60 * 24 * 15): array
    {
        return JwtService::issue($guard, $userId, $ttlMinutes);
    }

    public static function find(string $plainTextToken): ?array
    {
        return JwtService::parse($plainTextToken);
    }

    public static function revoke(string $plainTextToken): void
    {
        $payload = JwtService::parse($plainTextToken);

        if (is_array($payload)) {
            JwtService::revokeFromPayload($payload);
        }
    }
}
