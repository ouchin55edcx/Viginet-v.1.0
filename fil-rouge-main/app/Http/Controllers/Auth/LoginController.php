<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $credentials = $request->validated();

        $field = filter_var($credentials['login'], FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        if (Auth::attempt([$field => $credentials['login'], 'password' => $credentials['password']])) {

            $user = Auth::user();

            // Check if the user is banned
            if ($user->role === 'Client' && $user->client && $user->client->status === 'inactive') {
                Auth::logout(); // Log out the user if banned
                return redirect()->route('ban.page'); // Redirect to ban page
            }

            switch ($user->role) {
                case 'Client':
                    return redirect(RouteServiceProvider::CLIENT_HOME);
                    break;
                case 'Expert':
                    return redirect(RouteServiceProvider::EXPERT_HOME);
                    break;
                case 'SuperAdmin':
                    return redirect(RouteServiceProvider::SUPERADMIN_HOME);
                    break;
                default:
                    return redirect(RouteServiceProvider::HOME);
                    break;
            }
        }

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }
}
