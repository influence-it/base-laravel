<?php

declare(strict_types=1);

namespace Tests\Unit\InfluenceIT\Core\Controllers;

use InfluenceIT\Core\Controllers\BaseController;
use InfluenceIT\Core\DTOs\BaseDTO;
use Mockery as m;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class BaseControllerTest extends TestCase
{

    public function testShouldReturnOKWithDTO(): void
    {
        // Set
        $class = new class extends BaseController {};
        $dto = m::mock(BaseDTO::class);

        // Actions
        $result = $class->responseOkWithDTO(dto: $dto);

        // Assertions
        self::assertInstanceOf(Response::class, $result);
    }

}
