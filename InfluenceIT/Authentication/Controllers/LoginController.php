<?php

declare(strict_types=1);

namespace InfluenceIT\Authentication\Controllers;

use Illuminate\Http\Response;
use InfluenceIT\Authentication\Actions\Login;
use InfluenceIT\Authentication\Exceptions\InvalidCredentialsException;
use InfluenceIT\Authentication\Requests\LoginRequest;
use InfluenceIT\Core\Controllers\BaseController;
use InfluenceIT\Core\Exceptions\InvalidArgumentException;

class LoginController extends BaseController
{
    /**
     * @throws InvalidArgumentException
     * @throws InvalidCredentialsException
     */
    public function __invoke(LoginRequest $request, Login $login): Response
    {
        return $this->responseOkWithDTO(
            dto: $login->run(loginDTO: $request->toDTO())
        );
    }
}
