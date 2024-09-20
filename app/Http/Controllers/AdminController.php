<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    // ログインフォーム表示
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // ログイン処理
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        // 簡易的な認証（適宜、DBチェックに変更可能）
        if ($credentials['username'] === 'admin' && $credentials['password'] === 'password') {
            session(['is_admin' => true]);
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login')->withErrors('認証に失敗しました。');
    }

    // ログアウト処理
    public function logout()
    {
        session()->forget('is_admin');
        return redirect('/');
    }

    // ダッシュボード表示
    public function index()
    {
        return view('admin.dashboard');
    }
}
