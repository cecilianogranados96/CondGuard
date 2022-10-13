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
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'adminaccess' => \App\Filters\AdminAccess::class,
        'useraccess' => \App\Filters\UserAccess::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            // 'csrf',
            // 'invalidchars',
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
            // 'secureheaders',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['foo', 'bar']
     *
     * If you use this, you should disable auto-routing because auto-routing
     * permits any HTTP method to access a controller. Accessing the controller
     * with a method you don’t expect could bypass the filter.
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        'adminaccess' => [
            'before' => [
                'relative',
                'relative/new',
                'relative/detail',
                'relative/delete',
                'relative/save',
                'administrator',
                'administrator/*',
                'condo_owner',
                'condo_owner/new',
                'condo_owner/detail',
                'condo_owner/delete',
                'condo_owner/save',
                'vote',
                'vote/*',
                'officer',
                'officer/*',
                'authorized',
                'authorized/*',
                'assembly',
                'assembly/*',
                'assembly_voting',
                'assembly_voting/*',
                'reservation',
                'reservation/*',
                'common_area',
                'common_area/*',
                'patrol',
                'patrol/*',
                'relative_vehicle',
                'relative_vehicle/*'
            ]
        ],
        'useraccess' => [
            'before' => [
                'relative/profile',
                'administrator/profile',
                'condo_owner/profile'
            ]
        ]
    ];
}