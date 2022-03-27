<?php

declare(strict_types=1);

namespace InfluenceIT\Core\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use InfluenceIT\Core\DTOs\BaseDTO;

abstract class BaseController extends Controller
{

    public function responseOkWithDTO(BaseDTO $dto): Response
    {
        return response((array) $dto);
    }

}