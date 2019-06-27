<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */
    'defaults' => [
        'guard' => 'family',
        'passwords' => 'users',
    ],
    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session", "token"
    |
    */
    'guards' => [
        'family' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'family_api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
        'admin' => [
           'driver' => 'session',
           'provider' => 'admins',
        ],
        'admin-api' => [
           'driver' => 'token',
           'provider' => 'admins',
        ],
        'doctor' => [
           'driver' => 'session',
           'provider' => 'doctors',
        ],
        'doctor-api' => [
           'driver' => 'token',
           'provider' => 'doctors',
        ],
        'teacher' => [
           'driver' => 'session',
           'provider' => 'teachers',
        ],
        'teacher-api' => [
           'driver' => 'token',
           'provider' => 'teachers',
        ],
        'police' => [
           'driver' => 'session',
           'provider' => 'police',
        ],
        'police-api' => [
           'driver' => 'token',
           'provider' => 'police',
        ],
        'government' => [
           'driver' => 'session',
           'provider' => 'governments',
        ],
        'government-api' => [
           'driver' => 'token',
           'provider' => 'governments',
        ],
    ],
    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' =>  Modules\Admin\Entities\Admin::class,
        ],
        'doctors' => [
            'driver' => 'eloquent',
            'model' => Modules\Health\Entities\Doctor::class,
        ],
        'teachers' => [
            'driver' => 'eloquent',
            'model' => Modules\Education\Entities\Teacher::class,
        ],
        'police' => [
            'driver' => 'eloquent',
            'model' => Modules\Security\Entities\Police::class,
        ],
        'governments' => [
            'driver' => 'eloquent',
            'model' => Modules\Government\Entities\Government::class,
        ],
        
    ],
    /*
    |--------------------------------------------------------------------------
    | Resetting Passwords
    |--------------------------------------------------------------------------
    |
    | You may specify multiple password reset configurations if you have more
    | than one user table or model in the application and you want to have
    | separate password reset settings based on the specific user types.
    |
    | The expire time is the number of minutes that the reset token should be
    | considered valid. This security feature keeps tokens short-lived so
    | they have less time to be guessed. You may change this as needed.
    |
    */
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'doctors' => [
            'provider' => 'doctors',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'teachers' => [
            'provider' => 'teachers',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'police' => [
            'provider' => 'police',
            'table' => 'password_resets',
            'expire' => 60,
        ],
        'governments' => [
            'provider' => 'governments',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],
];
