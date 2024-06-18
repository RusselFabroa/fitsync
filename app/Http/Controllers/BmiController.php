<?php

namespace App\Http\Controllers;

use App\Models\Bmi;
use Illuminate\Http\Request;

class BmiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bmi = Bmi::all();
        return view('bmi.index', compact('bmi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bmi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bmi = new Bmi();
        $bmi->user_id = $request->user_id;
        $bmi->bmi_height = $request->bmi_height;
        $bmi->bmi_weight = $request->bmi_weight;
        $bmi->bmi_result = $request->bmi_result;
        $bmi->save();

        return redirect()->route('bmi.index')
            ->with('success', 'BMI record created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bmi $bmi)
    {
        return view('bmi.show', compact('bmi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bmi $bmi)
    {
        return view('bmi.edit', compact('bmi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bmi $bmi)
    {
        $bmi->user_id = $request->user_id;
        $bmi->bmi_height = $request->bmi_height;
        $bmi->bmi_weight = $request->bmi_weight;
        $bmi->bmi_result = $request->bmi_result;
        $bmi->save();

        return redirect()->route('bmi.index')
            ->with('success', 'BMI record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bmi $bmi)
    {
        $bmi->delete();

        return redirect()->route('bmi.index')
            ->with('success', 'BMI record deleted successfully.');
    }
}