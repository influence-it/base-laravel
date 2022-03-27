<?php

declare(strict_types=1);

namespace InfluenceIT\Core\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class BaseException extends Exception
{

    public function render(): JsonResponse
    {
        $httpStatusCode = $this->code > 99 && $this->code < 600
            ? $this->code
            : 500;

        $responseData = [
            'message' => trans($this->message),
            'code' => $this->message,
            'errors' => $this->errors ?? [],
        ];

        return response()->json($responseData, $httpStatusCode);
    }

}