<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\MembershipFees;
use Illuminate\Support\Facades\DB;
class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // Get the authenticated user's ID
        $userId = $request->user()->id;
    
        // Perform a join query to fetch the membership_title
        $user = DB::table('users')
            ->join('membership_fees', 'users.id', '=', 'membership_fees.user_id')
            ->where('users.id', $userId)
            ->select('users.*', 'membership_fees.membership_title', 'membership_fees.status')
            ->first();
    
        // Access the membership_title of the user
        $membershipTitle = $user->membership_title ?? null;
    
        return view('profile.edit', compact('user', 'membershipTitle'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function membership(Request $request): RedirectResponse
    {
        $request->validate([
            'membership' => ['nullable', 'string', 'max:255'],
        ]);

        // Get the authenticated user's ID
        $userId = Auth::id();
    
        // Check if the user already has a membership fee record
        $membershipFee = MembershipFees::where('user_id', $userId)->first();
    
        if ($membershipFee) {
            // Membership fee record already exists, update it
            $membershipFee->update([
                'membership_title' => $request->membership_title,
                'membership_mop' => $request->membership_mop,
                'membership_payment_date' => $request->membership_payment_date,
                'membership_payment_status' => $request->membership_payment_status,
            ]);
        } else {
            // Membership fee record doesn't exist, create a new one
            $membershipFee = MembershipFees::create([
                'user_id' => $userId,
                'membership_title' => $request->membership_title,
                'membership_mop' => $request->membership_mop,
                'membership_payment_date' => $request->membership_payment_date,
                'membership_payment_status' => $request->membership_payment_status,
            ]);
        }

        
                // Handle payment_receipt upload
                if ($request->hasFile('payment_receipt')) {
        
                    $file = $request->file('payment_receipt');
                
                    // Get the original file name
                    $fileName = $file->getClientOriginalName();
                
                    // Move the file to the specified storage path
                    $receiptPath = $file->move(public_path('images/payment_receipt'), $fileName);
                
                    // Get the full file path
                    $receiptFilePath = $fileName;
                
                    $membershipFee->update(['payment_receipt' => $fileName]);
                }
        
        
    
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
