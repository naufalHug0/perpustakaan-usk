<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'auth'=>\App\Http\Middleware\Authenticate::class,
            'guest'=>\App\Http\Middleware\Guest::class,
            'is_admin'=>\App\Http\Middleware\IsAdmin::class,
            'is_anggota'=>\App\Http\Middleware\IsAnggota::class,
            'is_pustakawan'=>\App\Http\Middleware\IsPustakawan::class,
        ]);

        // $middleware->trimStrings([
        //     'password'
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        
    })->create();
