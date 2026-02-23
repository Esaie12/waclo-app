<?php

namespace App\Support;

use Illuminate\Support\Facades\Cache;

class JwtService
{
    public static function issue(string $guard, int $userId, int $ttlMinutes = 60 * 24 * 15): array
    {
        $secret = self::secretKey();
        $now = time();
        $exp = $now + ($ttlMinutes * 60);
        $jti = bin2hex(random_bytes(16));

        $header = [
            'alg' => 'HS256',
            'typ' => 'JWT',
        ];

        $payload = [
            'iss' => config('app.name', 'waclo-app'),
            'iat' => $now,
            'nbf' => $now,
            'exp' => $exp,
            'jti' => $jti,
            'guard' => $guard,
            'sub' => $userId,
        ];

        $headerEncoded = self::base64UrlEncode(json_encode($header, JSON_UNESCAPED_SLASHES));
        $payloadEncoded = self::base64UrlEncode(json_encode($payload, JSON_UNESCAPED_SLASHES));

        $signature = hash_hmac('sha256', $headerEncoded.'.'.$payloadEncoded, $secret, true);
        $signatureEncoded = self::base64UrlEncode($signature);

        $token = $headerEncoded.'.'.$payloadEncoded.'.'.$signatureEncoded;

        return [
            'token' => $token,
            'token_type' => 'Bearer',
            'expires_in_minutes' => $ttlMinutes,
        ];
    }

    public static function parse(string $token): ?array
    {
        $parts = explode('.', $token);

        if (count($parts) !== 3) {
            return null;
        }

        [$headerEncoded, $payloadEncoded, $signatureEncoded] = $parts;

        $headerJson = self::base64UrlDecode($headerEncoded);
        $payloadJson = self::base64UrlDecode($payloadEncoded);
        $signature = self::base64UrlDecode($signatureEncoded);

        if ($headerJson === false || $payloadJson === false || $signature === false) {
            return null;
        }

        $header = json_decode($headerJson, true);
        $payload = json_decode($payloadJson, true);

        if (! is_array($header) || ! is_array($payload)) {
            return null;
        }

        if (($header['alg'] ?? null) !== 'HS256' || ($header['typ'] ?? null) !== 'JWT') {
            return null;
        }

        $expectedSig = hash_hmac('sha256', $headerEncoded.'.'.$payloadEncoded, self::secretKey(), true);

        if (! hash_equals($expectedSig, $signature)) {
            return null;
        }

        $now = time();

        if (($payload['nbf'] ?? 0) > $now || ($payload['exp'] ?? 0) < $now) {
            return null;
        }

        $jti = $payload['jti'] ?? null;

        if (! is_string($jti) || self::isRevoked($jti)) {
            return null;
        }

        return $payload;
    }

    public static function revokeFromPayload(array $payload): void
    {
        $jti = $payload['jti'] ?? null;
        $exp = $payload['exp'] ?? null;

        if (! is_string($jti) || ! is_int($exp)) {
            return;
        }

        $secondsToExpire = max(1, $exp - time());
        Cache::put(self::revocationKey($jti), true, now()->addSeconds($secondsToExpire));
    }

    private static function isRevoked(string $jti): bool
    {
        return (bool) Cache::get(self::revocationKey($jti), false);
    }

    private static function revocationKey(string $jti): string
    {
        return 'jwt_revoked:'.$jti;
    }

    private static function secretKey(): string
    {
        return (string) config('app.key');
    }

    private static function base64UrlEncode(string $value): string
    {
        return rtrim(strtr(base64_encode($value), '+/', '-_'), '=');
    }

    private static function base64UrlDecode(string $value): string|false
    {
        $remainder = strlen($value) % 4;

        if ($remainder > 0) {
            $value .= str_repeat('=', 4 - $remainder);
        }

        return base64_decode(strtr($value, '-_', '+/'), true);
    }
}
