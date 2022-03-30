<?php

declare(strict_types=1);

namespace Tests\Unit\InfluenceIT\Authentication\DTOs;

use InfluenceIT\Authentication\DTOs\LoginDTO;
use InfluenceIT\Core\Exceptions\InvalidArgumentException;
use Tests\TestCase;

class LoginDTOTest extends TestCase
{

    /**
     * @throws InvalidArgumentException
     */
    public function testShouldGetCredentials(): void
    {
        // Set
        $password = $this->faker->password;
        $email = $this->faker->email;
        $loginDTO = new LoginDTO(password: $password, email: $email);
        $expected = compact('password', 'email');

        // Actions
        $result = $loginDTO->getCredentials();

        // Assertions
        self::assertSame($expected, $result);
    }

    public function testShouldThrowInvalidArgumentExceptionWhenCellphoneAndEmailIsEmpty(): void
    {
        // Expectations
        $this->expectException(InvalidArgumentException::class);

        // Action
        new LoginDTO(password: $this->faker->password);
    }

}