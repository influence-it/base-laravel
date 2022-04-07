<?php

declare(strict_types=1);

namespace Tests\Unit\InfluenceIT\Core\Exceptions;

use InfluenceIT\Core\Exceptions\BaseException;
use Tests\TestCase;

class BaseExceptionTest extends TestCase
{

    public function testShouldRenderWithValidCode(): void
    {
        // Set
        $message = $this->faker->sentence;
        $code = $this->faker->numberBetween(100,599);
        $expected = array_merge(compact('message', 'code'), ['errors' => []]);

        $exception = new BaseException(message: $message, code: $code);

        // Actions
        $result = $exception->render();

        // Assertions
        self::assertSame(expected: $code, actual: $result->status());
        self::assertSame(expected: $expected, actual: json_decode($result->content(), true));

    }

}