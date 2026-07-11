<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    'allowed_origins' => ['*'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'], // penting: biar header 'Authorization' Bearer tidak diblokir preflight

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false, // Anda pakai Bearer token (Sanctum token, bukan cookie SPA), jadi false
];