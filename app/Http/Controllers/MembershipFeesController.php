<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\MembershipFees;

class MembershipFeesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $membershipFees = MembershipFees::join('users', 'membership_fees.user_id', '=', 'users.id')
            ->select('membership_fees.*', 'users.name as user_name') // Add other columns if needed
            ->get();
        return view('membershipFees.index', compact('membershipFees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = User::where('role', 'user')->get();
        return view('membershipFees.create', compact('members'));
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

        MembershipFees::create($validatedData);

        return redirect()->route('membershipFees.index')->with('success', 'Membership Fee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(MembershipFees $membershipFees)
    {
        return view('membershipFees.show', compact('membershipFees'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $membershipFees = MembershipFees::join('users', 'membership_fees.user_id', '=', 'users.id')
            ->where('membership_fees.membership_id', $id)
            ->select('membership_fees.*', 'users.name as user_name') // Add other columns if needed
            ->firstOrFail();
        $members = User::where('role', 'user')->get();
        return view('membershipFees.edit', compact('membershipFees', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function customUpdate(Request $request, MembershipFees $membershipFees)
    {
        $this->validate($request, [
            'user_id' => 'nullable|integer',
            'membership_title' => 'nullable|string',
            'membership_mop' => 'nullable|string',
            'membership_payment_date' => 'nullable|string',
            'membership_payment_status' => 'nullable|string',
        ]);

        $membershipFees->update($request->all());

        return redirect()->route('membershipFees.index')->with('success', 'Membership Fee updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MembershipFees $membershipFee)
    {
        $membershipFee->delete();

        return redirect()->route('membershipFees.index')->with('success', 'Membership Fee deleted successfully.');
    }
}
