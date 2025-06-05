<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    /**
     * Aliases untuk memudahkan pemanggilan filter.
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'authfilter'    => \App\Filters\AuthFilter::class, // 🟢 Tambahkan ini untuk filter login
    ];

    /**
     * Filter global yang selalu dijalankan untuk setiap request.
     */
    public array $globals = [
        'before' => [
            // 'csrf',
            // 'honeypot',
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * Filter berdasarkan method HTTP (opsional, tidak digunakan di sini).
     */
    public array $methods = [];

    /**
     * Filter berdasarkan URI tertentu.
     * 
     * Ini diperlukan jika Anda ingin secara eksplisit menerapkan filter ke route berdasarkan URI.
     */
    public array $filters = [
        'authfilter' => [
            'before' => [
                'admin',
                'admin/*',
                'vendor',
                'vendor/*',
                'masyarakat',
                'masyarakat/*',
            ],
        ],
    ];
}
