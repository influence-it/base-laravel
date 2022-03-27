<?php

declare(strict_types=1);

namespace InfluenceIT\Authentication\Requests;

use InfluenceIT\Authentication\DTOs\LoginDTO;
use InfluenceIT\Core\Exceptions\InvalidArgumentException;
use InfluenceIT\Core\Request\BaseRequest;

class LoginRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'password' => ['required', 'string', 'min:6'],
            'cellphone' => ['required_without:email', 'integer', 'min:8'],
            'email' => ['required_without:cellphone', 'max:255', 'email:rfc,dns'],
        ];
    }

    /**
     * @throws InvalidArgumentException
     */
    public function toDTO(): LoginDTO
    {
        return new LoginDTO(
            password: $this->get('password'),
            cellphone: (string) $this->get('cellphone'),
            email: $this->get('email')
        );
    }
}