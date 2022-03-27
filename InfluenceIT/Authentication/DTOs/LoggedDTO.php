<?php

declare(strict_types=1);

namespace InfluenceIT\Authentication\DTOs;

use InfluenceIT\Core\DTOs\BaseDTO;

class LoggedDTO extends BaseDTO
{
    public function __construct(public string $access_token, public string $token_type, public int $expires_in)
    {
    }
}
