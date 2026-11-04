<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckManager
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 如果取不到登入後台時暫存的帳號, 表示沒登入過, 或是暫存的時間已過期
        // empty: 空的, 也可以用 is_null
        if (empty(session()->get('userId')))
            {
                return redirect('/admin');
            }
        return $next($request);
    }
}
