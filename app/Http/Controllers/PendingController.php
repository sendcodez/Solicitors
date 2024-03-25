<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pending;
class PendingController extends Controller
{
    /**
     * Display a listing of the reso urce.
     */
    public function index()
    {
        $pending = Pending::all();

        return view('admin.pending', [
            'pending' => $pending,
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

        Pending::create([

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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
