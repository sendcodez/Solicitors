<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Solicitor;
use Illuminate\Support\Facades\Hash;

class SolicitorsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $solicitors = Solicitor::all();

        return view('admin.solicitors', [
            'solicitors' => $solicitors,
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

            'fullname' => ['required'],
            'address' => ['required'],
            'contact_no' => ['required'],
            'purpose' => ['required'],
            
        ]);

        Solicitor::create([

            'fullname' => $request->fullname,
            'address' => $request->address,
            'contact_no' => $request->contact_no,
            'purpose' => $request->purpose,
           
            
        ]);

        return back()->with('success', 'Solicitor added successfully.');
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
        $solicitors = Solicitor::findOrFail($id); // Retrieve the solicitor by ID
        return view('solicitors.edit', compact('solicitor')); // Pass the user data to the view
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Retrieve the user by ID
        $solicitors = Solicitor::findOrFail($id);

        // Validate the request data
        $request->validate([
            'fullname' => 'required|string|max:255',
            'address' => 'required',
            'contact_no' => 'required', 
            'purpose' => 'required', 
           
            // Add validation rules for other fields as needed
        ]);

        // Update the user data
        $solicitors->fullname = $request->input('fullname');
        $solicitors->address = $request->input('address');
        $solicitors->contact_no = $request->input('contact_no');
        $solicitors->purpose = $request->input('purpose');
        // Log the activity
    

        // Save the updated user data
        $solicitors->save();

        return back()->with('success', 'Solicitor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */


  
    public function destroy(string $id)
    {
        $solicitors = Solicitor::findOrFail($id); // Find the user by ID, including soft-deleted ones
        $solicitors->delete(); // Permanently delete the user
        return back()->with('success', 'Solicitor deleted successfully.');
    }
}
