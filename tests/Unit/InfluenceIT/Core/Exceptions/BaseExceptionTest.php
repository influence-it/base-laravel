<?php

declare(strict_types=1);

namespace Tests\Unit\InfluenceIT\Core\Exceptions;

use InfluenceIT\Core\Exceptions\BaseException;
use Tests\TestCase;

class BaseExceptionTest extends TestCase
{

    /**
     * @dataProvider getRenderScenarios
     */
    public function testShouldRenderWithValidCode(string $message, int $code, array $expected): void
    {
        // Set
        $exception = new BaseException(message: $message, code: $code);

        // Actions
        $result = $exception->render();

        // Assertions
        self::assertSame(expected: $expected['code'], actual: $result->status());
        self::assertSame(expected: $expected, actual: json_decode($result->content(), true));

    }

    public function getRenderScenarios(): array
    {

        $code = $this->faker->numberBetween(100, 599);
        $message = $this->faker->sentence;

        return [
            'valid code' => [
                'message' => $message,
                'code' => $code,
                'expected' => array_merge(compact('message', 'code'), ['errors' => []])
            ],
            'invalid code' => [
                'message' => $message,
                'code' => $this->faker->numberBetween(1000),
                'expected' => array_merge(compact('message'), ['code' => 500, 'errors' => []])
            ],
        ];
    }

}