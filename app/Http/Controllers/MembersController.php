<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\MembershipFees;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = MembershipFees::join('users', 'membership_fees.user_id', '=', 'users.id')
        ->select('membership_fees.*', 'users.name as user_name')
        ->where('users.role', 'user') // Add condition for user role
        ->get();
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = User::where('role', 'user')->get();
        return view('members.create', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'membership_title' => 'required|string',
            'membership_mop' => 'required|string',
            'membership_payment_date' => 'required|string',
            'membership_payment_status' => 'required|string',
        ]);

        User::create($validatedData);

        return redirect()->route('members.index')->with('success', 'Membership Fee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $members)
    {
        return view('members.show', compact('members'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $members = MembershipFees::findOrFail($id);
        return view('members.edit', compact('members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status' => 'nullable|string',
        ]);
    
        $member = MembershipFees::findOrFail($id); // Assuming your User model is named User
    
        $member->update($request->all());
    
        return redirect()->route('members.index')->with('success', 'Membership Fee updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $membershipFee)
    {
        $membershipFee->delete();

        return redirect()->route('members.index')->with('success', 'Membership Fee deleted successfully.');
    }
}
