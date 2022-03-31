<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse(string $message, $data = [], int $code = 200)
    {
        $response = [
            'success' => true,
            'message' => $message, 
            'data' => $data
        ];
        return response()->json($response, $code);
    }

    public function sendError(string $message, int $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $message, 
        ];
        return response()->json($response, $code);
    }
}