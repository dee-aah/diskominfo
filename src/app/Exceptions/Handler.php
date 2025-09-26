<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Exceptions\AuthorizationException;
use Throwable;

class Handler extends ExceptionHandler
{
    // daftar exception yang tidak dilaporkan
    protected $dontReport = [
        //
    ];

    // daftar input yang tidak ditampilkan kembali saat validasi gagal
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function register()
    {
        //
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof AuthorizationException) {
            return redirect()->route('artikell.dashboard')
                ->with('error', '❌ Anda tidak memiliki izin untuk mengakses halaman ini!');
        }

        return parent::render($request, $exception);
    }
}
