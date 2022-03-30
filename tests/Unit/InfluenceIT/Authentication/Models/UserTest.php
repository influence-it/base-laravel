<?php

declare(strict_types=1);

namespace Tests\Unit\InfluenceIT\Authentication\Models;

use InfluenceIT\Authentication\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{

    public function testShouldGetJWTCustomClaims(): void
    {
        // Set
        $user = new User();

        // Actions
        $result = $user->getJWTCustomClaims();

        // Expectations
        self::assertEmpty($result);
    }

    public function testShouldGetJWTIdentifier(): void
    {
        // Set
        $user = new User();

        // Actions
        $result = $user->getJWTIdentifier();

        // Expectations
        self::assertNull($result);
    }
}