<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\ApiController;

class AuthController extends ApiController
{
    public function server()
    {
        return $this->sendResponse('Server is online');
    }
}