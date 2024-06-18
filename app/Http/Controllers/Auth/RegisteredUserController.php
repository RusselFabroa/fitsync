<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\MembershipFees;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'dob' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string', 'max:255'],
            'contact_number' => ['nullable', 'string', 'max:255'],
            'is_disabled' => ['nullable', 'string', 'max:255'],
            'specify' => ['nullable', 'string', 'max:255'],
            'emergency_name' => ['nullable', 'string', 'max:255'],
            'emergency_contact' => ['nullable', 'string', 'max:255'],
            'emergency_relationship' => ['nullable', 'string', 'max:255'],
            'membership' => ['nullable', 'string', 'max:255'],
            'profession' => 'nullable'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'dob' => $request->dob,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'is_disabled' => $request->is_disabled,
            'specify' => $request->specify,
            'emergency_name' => $request->emergency_name,
            'emergency_contact' => $request->emergency_contact,
            'emergency_relationship' => $request->emergency_relationship,
            'membership' => $request->membership,
            'profession' => $request->profession
        ]);

            // Create membership fee record
        $membershipFee = MembershipFees::create([
            'user_id' => $user->id,
            'membership_title' => $request->membership_title,
            'membership_mop' => $request->membership_mop,
            'membership_payment_date' => $request->membership_payment_date,
            'membership_payment_status' => $request->membership_payment_status,
            // Handle payment_receipt upload
        ]);

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

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
