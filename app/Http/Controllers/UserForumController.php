<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use Illuminate\Support\Facades\Auth;

class UserForumController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $forums = Forum::join('users', 'forums.user_id', '=', 'users.id')
        ->select('forums.*', 'users.name as user_name')
        ->get();

        $AuthUserId = Auth::id();
        return view('user.forums.index', compact('forums','AuthUserId'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('forums.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Get the authenticated user's ID
        $userId = Auth::id();
        $user = Auth::user();
        $userRole = $user->role; // Assuming 'role' is the name of the column in the users table
    
        // Validate the request data
        $validatedData = $request->validate([
            'forum_content' => 'required|string',
        ]);
    
        // Create a new Forum instance
        $forum = new Forum();
        $forum->user_id = $userId; // Assign the user ID
        $forum->forum_content = $request->forum_content;
        $forum->role = $userRole; // Assign the user ID
        $forum->save();
    
        // Redirect to the forum index page with a success message
        return redirect()->route('forums.index')->with('success', 'Forum post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Forum $forum)
    {
        return view('forums.show', compact('forum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $forums = Forum::findOrFail($id);
        return view('forums.edit', compact('forums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Forum $forum)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|integer',
            'forum_content' => 'required|string',
        ]);

        $forum->update($validatedData);

        return redirect()->route('forums.index')
            ->with('success', 'Forum record updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Forum $forum)
    {
        $forum->delete();

        return redirect()->route('forums.index')->with('success', 'Forum post deleted successfully.');
    }
}
