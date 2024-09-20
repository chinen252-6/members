<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // ここで管理者であるかどうかの確認
        if (!$this->isAdmin()) {
            return redirect('/login');  // 管理者でなければログインページへリダイレクト
        }

        return $next($request);
    }

    private function isAdmin()
    {
        // 管理者かどうかを判定。適切に実装されていることを前提とする
        // 例: セッションや特定の条件で管理者を確認
        return session()->has('is_admin') && session('is_admin') === true;
    }
}