<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminRegistrationController extends Controller
{
    // Show the registration form for admins
    public function showAdminRegistrationForm()
    {
        // return view('auth.register_admin'); // Create this view
        return view('auth.register_admin', ['role' => 'admin']);
    }

    // Handle admin registration
    public function register(Request $request)
    {
        // Validate the request
        $this->validator($request->all())->validate();

        // Create the admin user
        $user = $this->create($request->all());

        // You can also log in the user if you want
        // Auth::login($user);

        return redirect()->route('admin.dashboard'); // Redirect to a desired route after registration
    }

    // Validate the registration data
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], // Make sure to confirm password
            'role' => ['required', 'string'], // Add any role validation if needed
        ]);
    }

    // Create a new user instance after a valid registration
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'admin', // Default role for admin
        ]);
    }
};