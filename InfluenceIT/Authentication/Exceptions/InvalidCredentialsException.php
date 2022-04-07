<?php

declare(strict_types=1);

namespace InfluenceIT\Authentication\Exceptions;

use InfluenceIT\Core\Exceptions\BaseException;
use Symfony\Component\HttpFoundation\Response;

class InvalidCredentialsException extends BaseException
{
    protected $message = 'authentication.credentials.invalid';

    protected $code = Response::HTTP_FORBIDDEN;
}