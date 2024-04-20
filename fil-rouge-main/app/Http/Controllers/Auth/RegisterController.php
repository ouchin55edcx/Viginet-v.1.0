<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;

class RegisterController extends Controller
{

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:Client,Expert,SuperAdmin',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        if ($validatedData['role'] === 'Client') {
            $request->validate([
                'phone_number' => 'required|string',
                'address' => 'required|string',
            ]);

            $user->client()->create([
                'phone_number' => $request->phone_number,
                'address' => $request->address,
            ]);

            return redirect($this->redirectTo);
        } elseif ($validatedData['role'] === 'Expert') {
            $request->validate([
                'certificate' => 'required|string',
                'experience' => 'required|string',
            ]);

            $user->expert()->create([
                'certificate' => $request->certificate,
                'experience' => $request->experience,
            ]);

            return redirect($this->redirectTo);
        }

        // For SuperAdmin or any other roles, you can provide a default redirect
        return redirect($this->redirectTo);
    }
}

