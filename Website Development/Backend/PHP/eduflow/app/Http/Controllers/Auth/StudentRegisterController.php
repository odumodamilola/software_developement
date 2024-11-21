<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

class StudentRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register-student');
    }

    public function register(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
       

        Role::create(['name' => 'student']);

        // Assign the student role
        $user->assignRole('student');

        // Redirect or return response
        return redirect()->route('student.dashboard')->with('success', 'Student registered successfully.');
    }
}
