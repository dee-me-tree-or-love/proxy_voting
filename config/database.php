<?php

if (getenv('REDIS_URL')) {
    $url = parse_url(getenv('REDIS_URL'));
    $dbUrl = parse_url(env("DATABASE_URL"));
    
    putenv('DB_HOST='.$dbUrl["host"]);
    putenv('DB_PORT='.$dbUrl["port"]);
    putenv('DB_DATABASE='.substr($dbUrl["path"],1));
    putenv('DB_USERNAME='.$dbUrl["user"]);
    putenv('DB_PASSWORD='.$dbUrl["pass"]);


    putenv('REDIS_HOST='.$url['host']);
    putenv('REDIS_PORT='.$url['port']);
    putenv('REDIS_PASSWORD='.$url['pass']);
}

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', 'ec2-184-72-223-199.compute-1.amazonaws.com'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'd8djnb7rv3e95o'),
            'username' => env('DB_USERNAME', 'ztemnkbghcusyl'),
            'password' => env('DB_PASSWORD', '2eadd961bec4d0045b0694a2e5b2864014d9e06c4549a7db42127902c9090988'),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => 'predis',

        'default' => [
            'host' => env('REDIS_HOST', 'ec2-34-235-35-224.compute-1.amazonaws.com'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6829),
            'database' => 0,
        ],

    ],

];
