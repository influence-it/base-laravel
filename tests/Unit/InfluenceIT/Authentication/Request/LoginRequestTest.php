<?php

declare(strict_types=1);

namespace Tests\Unit\InfluenceIT\Authentication\Request;

use InfluenceIT\Authentication\Requests\LoginRequest;
use Mockery as m;
use Tests\TestCase;

class LoginRequestTest extends TestCase
{
    public function testShouldToDTO(): void
    {
        // Set
        $loginRequest = m::mock(LoginRequest::class)->makePartial();
        $email = $this->faker->email;
        $password = $this->faker->password;
        $cellphone = $this->faker->phoneNumber;

        // Expectations
        $loginRequest->expects()
            ->get('email')
            ->andReturn($email);

        $loginRequest->expects()
            ->get('password')
            ->andReturn($password);

        $loginRequest->expects()
            ->get('cellphone')
            ->andReturn($cellphone);

        // Actions
        $result = $loginRequest->toDTO();

        // Assertions
        self::assertSame($email, $result->email);
        self::assertSame($password, $result->password);
        self::assertSame($cellphone, $result->cellphone);
    }

    public function testShouldGetRule(): void
    {
        // Set
        $loginRequest = m::mock(LoginRequest::class)->makePartial();
        $expected = [
            'password' => ['required', 'string', 'min:6'],
            'cellphone' => ['required_without:email', 'integer', 'min:8'],
            'email' => ['required_without:cellphone', 'max:255', 'email:rfc,dns'],
        ];

        // Actions
        $result = $loginRequest->rules();

        // Assertions
        self::assertSame($expected, $result);
    }
}
