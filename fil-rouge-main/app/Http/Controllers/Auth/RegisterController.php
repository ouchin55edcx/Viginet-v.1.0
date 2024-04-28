<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterUserRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterUserRequest $request)
    {
        try {
            $validatedData = $request->validated();

            $validatedData['password'] = Hash::make($validatedData['password']);

            $user = User::create($validatedData);

            if ($validatedData['role'] === 'Client') {
                $user->client()->create([
                    'phone_number' => $validatedData['phone_number'],
                    'address' => $validatedData['address'],
                ]);
            } elseif ($validatedData['role'] === 'Expert') {
                $user->expert()->create([
                    'certificate' => $validatedData['certificate'],
                    'experience' => $validatedData['experience'],
                ]);
            }

            return redirect($this->redirectTo);
        } catch (\Exception $e) {
            Log::error('User registration failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'An error occurred during registration. Please try again later.']);
        }
    }
}
