<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('archived', false)->get();

        return view('admin.users', [
            'users' => $users,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $this->validate($request, [

            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],


        ]);

        User::create([

            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            
        ]);

        return back()->with('success', 'User added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id); // Retrieve the user by ID
        return view('users.edit', compact('user')); // Pass the user data to the view
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Retrieve the user by ID
        $user = User::findOrFail($id);

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8', // Password is optional and must be at least 8 characters long
           
            // Add validation rules for other fields as needed
        ]);

        // Update the user data
        $user->name = $request->input('name');
        $user->email = $request->input('email');


        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        // Log the activity
    

        // Save the updated user data
        $user->save();

        return back()->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */


  
    public function destroy(string $id)
    {
        $user = User::findOrFail($id); // Find the user by ID, including soft-deleted ones
        $user->forceDelete(); // Permanently delete the user
        return back()->with('success', 'User deleted successfully.');
    }
}
