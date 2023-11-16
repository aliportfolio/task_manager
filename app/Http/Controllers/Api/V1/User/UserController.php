<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Traits\Api\V1\ApiResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use ApiResponse;
    public function index()
    {
        $user = auth()->user();
        return $this->sendSuccess($user, "Show Successfully");
    }
}
