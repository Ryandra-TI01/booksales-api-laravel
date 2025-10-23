<?php

namespace App\Http\Middleware;

use App\Traits\ApiResponse;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    use ApiResponse;
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            return $this->errorResponse('Unauthenticated', null, 401);
        }

        return null;
    }
}
