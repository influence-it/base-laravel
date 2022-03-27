<?php

declare(strict_types=1);

namespace InfluenceIT\Authentication\DTOs;

use InfluenceIT\Core\DTOs\BaseDTO;
use InfluenceIT\Core\Exceptions\InvalidArgumentException;

class LoginDTO extends BaseDTO
{

    /**
     * @throws InvalidArgumentException
     */
    public function __construct(public string $password, public ?string $cellphone, public ?string $email)
    {
        if (!$this->cellphone && !$this->email) {
            throw new InvalidArgumentException();
        }
    }

    public function getCredentials(): array
    {
        return array_filter(get_object_vars($this));
    }

}