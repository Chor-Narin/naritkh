<?php

return [
    'secret' => env('JWT_SECRET'),
    'ttl' => env('JWT_TTL', 60), // Token expiry in minutes
    'refresh_ttl' => env('JWT_REFRESH_TTL', 20160), // Refresh token expiry
    'algo' => env('JWT_ALGO', 'HS256'),
];

