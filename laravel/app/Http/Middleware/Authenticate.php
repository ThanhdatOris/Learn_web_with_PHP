<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo(Request $request): ?string
    {
        // Kiểm tra xem yêu cầu có mong đợi một phản hồi JSON hay không
        // Nếu có, trả về null, nếu không, chuyển hướng đến route 'login'
        return $request->expectsJson() ? null : route('login');
    }
}