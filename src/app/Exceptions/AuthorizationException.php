<?php

namespace App\Exceptions;

use Exception;

class AuthorizationException extends Exception
{
    protected $message = 'Anda tidak memiliki izin untuk mengakses halaman ini.';
    protected $code = 403;

    public function __construct($message = null, $code = 403)
    {
        parent::__construct($message ?? $this->message, $code);
    }
}
