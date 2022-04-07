<?php

declare(strict_types=1);

namespace InfluenceIT\Authentication\Actions;

use Illuminate\Support\Facades\Auth;
use InfluenceIT\Authentication\DTOs\LoggedDTO;
use InfluenceIT\Authentication\DTOs\LoginDTO;
use InfluenceIT\Authentication\Exceptions\InvalidCredentialsException;

class Login
{
    /**
     * @throws InvalidCredentialsException
     */
    public function run(LoginDTO $loginDTO): LoggedDTO
    {

        if (!$token = Auth::attempt($loginDTO->getCredentials())) {
            throw new InvalidCredentialsException();
        }

        return new LoggedDTO(
            access_token: (string)$token,
            token_type: 'bearer',
            expires_in: Auth::factory()->getTTL() * 60
        );
    }
}
