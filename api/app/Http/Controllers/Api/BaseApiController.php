<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Traits\JsonResponse;

class BaseApiController extends Controller
{
    use JsonResponse;
}