<?php

declare(strict_types=1);

namespace Tests\Unit\InfluenceIT\Authentication\Action;

use Illuminate\Support\Facades\Auth;
use InfluenceIT\Authentication\Actions\Login;
use InfluenceIT\Authentication\DTOs\LoggedDTO;
use InfluenceIT\Authentication\DTOs\LoginDTO;
use InfluenceIT\Authentication\Exceptions\InvalidCredentialsException;
use Mockery as m;
use Tests\TestCase;

class LoginTest extends TestCase
{

    public function testShouldLoginSuccessfully(): void
    {
        // Set
        $login = new Login();
        $loginDTO = m::mock(LoginDTO::class);
        $loginCredentials = [];
        $token = $this->faker->md5();

        $expected = new LoggedDTO(access_token: $token, token_type: 'bearer', expires_in: 3600);

        // Expectations
        $loginDTO->expects()
            ->getCredentials()
            ->andReturn($loginCredentials);

        Auth::shouldReceive('attempt')
            ->with($loginCredentials)
            ->andReturn($token);

        Auth::shouldReceive('factory')
            ->andReturnSelf();

        Auth::shouldReceive('getTTL')
            ->andReturn(60);

        // Actions
        $result = $login->run(loginDTO: $loginDTO);

        // Assertions
        self::assertEquals($expected, $result);
    }

    public function testShouldThrowExceptionForInvalidCredentials(): void
    {
        // Set
        $login = new Login();
        $loginDTO = m::mock(LoginDTO::class);
        $loginCredentials = [];

        // Expectations
        $loginDTO->expects()
            ->getCredentials()
            ->andReturn($loginCredentials);

        Auth::shouldReceive('attempt')
            ->with($loginCredentials)
            ->andReturnFalse();

        $this->expectException(InvalidCredentialsException::class);

        // Actions
        $login->run(loginDTO: $loginDTO);
    }
}
