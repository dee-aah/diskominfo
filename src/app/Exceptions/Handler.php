<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as Exceptions;
use Illuminate\Auth\Access\AuthorizationException;
use Throwable;

class Handler extends Exceptions
{
    protected $dontReport = [
        //
    ];

    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        //
    }

    public function render($request, Throwable $exception)
    {
    if ($exception instanceof AuthorizationException) {
        return redirect()->back()
            ->with('error', ' Anda tidak memiliki izin untuk mengakses halaman ini!');
    }
    return parent::render($request, $exception);
    }

}
