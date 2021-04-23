<?php

namespace Config;

use App\Filters\JWTAuthenticationFilter;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;

class Filters extends BaseConfig
{
	/**
	 * Configures aliases for Filter classes to
	 * make reading things nicer and simpler.
	 *
	 * @var array
	 */
	public $aliases = [
		'csrf'     => CSRF::class,
		'toolbar'  => DebugToolbar::class,
		'honeypot' => Honeypot::class,
    'auth' => JWTAuthenticationFilter::class // add this line
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
		],
		'after'  => [
			// 'toolbar',
			// 'honeypot',
		],
	];

	/**
	 * List of filter aliases that works on a
	 * particular HTTP method (GET, POST, etc.).
	 *
	 * Example:
	 * 'post' => ['csrf', 'throttle']
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
    'auth' => [
      'before' => [
        'api/account/*',
        'api/address',
        'api/address/*',
        'api/file',
        'api/file/*',
        'api/permission',
        'api/permission/*',
        'api/post',
        'api/post/*',
        'api/post-category',
        'api/post-category/*',
        'api/post-comment',
        'api/post-comment/*',
        'api/post-has-category',
        'api/post-has-category/*',
        'api/post-has-image',
        'api/post-has-image/*',
        'api/role',
        'api/role/*',
        'api/user',
        'api/user/*',
      ],
    ],
  ];
}
