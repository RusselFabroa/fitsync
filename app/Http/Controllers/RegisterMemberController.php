<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisterMemberController extends Controller
{
    public function index()
    {
        $user = User::where('role','user')->get();
        $member = User::all();
        $trainer = User::where('role','trainer')->get();
        return view('registerMember.index', compact('member','trainer','user'));
    }

    /**
     * Display the registration view.
     */
    public function create()
    {
        return view('registerMember.create');
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:' . User::class,
            'age' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'membership' => 'nullable|string|max:255',
            'active_date' => 'nullable|string|max:255',
            'availability' => 'nullable|string|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => 'nullable',
            'profession' => 'nullable'
        ]);

        User::create($validatedData);

        return redirect()->route('registerMember.index')->with('success', 'Member created successfully.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $members = User::findOrFail($id);
        return view('registerMember.edit', compact('members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $members)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:' . User::class,
            'age' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'occupation' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'role' => 'nullable|string|max:255',
            'membership' => 'nullable|string|max:255',
            'active_date' => 'nullable|string|max:255',
            'availability' => 'nullable|string|max:255',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => 'nullable'
        ]);

        $members->update($validatedData);

        return redirect()->route('registerMember.index')
            ->with('success', 'Member record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $members)
    {
        $members->delete();

        return redirect()->route('registerMember.index')->with('success', 'Member deleted successfully.');
    }
}
