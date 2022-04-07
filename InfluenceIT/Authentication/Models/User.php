<?php

declare(strict_types=1);

namespace InfluenceIT\Authentication\Models;

use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends \InfluenceIT\User\User implements JWTSubject
{
    public function getJWTIdentifier(): mixed
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }
}
