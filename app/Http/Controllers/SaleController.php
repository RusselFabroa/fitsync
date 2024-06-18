<?php

namespace App\Http\Controllers;

use App\Models\MembershipFees;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

use function Laravel\Prompts\search;
use function PHPUnit\Framework\isNull;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');
        $status = $request->query('status');
        $date = $request->query('date');


            $membership_data = MembershipFees::join('membership_info', 'membership_fees.membership_title', '=', 'membership_info.membership_title')
            ->leftJoin('users', 'membership_fees.user_id', '=', 'users.id')
            ->select('membership_fees.*', 'membership_info.membership_fee', 'users.name')
            ->where('users.name', 'like', '%'.$search.'%')
            ->whereDate('membership_fees.membership_payment_date', 'like', '%'.$date.'%')
            // ->orWhere('membership_fees.membership_title', 'like', '%'.$status.'%')

            ->get();



        // $membership_data = MembershipFees::leftJoin('membership_info', 'membership_fees.membership_title', '=', 'membership_info.membership_title')
        // ->select('membership_fees.*', 'membership_info.membership_fee')
        // ->get();
        return view('reportPages.index',compact('search','status','date','membership_data'));
        // return view('reportPages.index', compact('classSchedules', 'select_exercises'));

    }


    public function print(Request $request)
    {
        $search = $request->query('search');
        $status = $request->query('status');
        $date = $request->query('date');


            $membership_data = MembershipFees::join('membership_info', 'membership_fees.membership_title', '=', 'membership_info.membership_title')
            ->leftJoin('users', 'membership_fees.user_id', '=', 'users.id')
            ->select('membership_fees.*', 'membership_info.membership_fee', 'users.name')
            ->where('users.name', 'like', '%'.$search.'%')
            ->whereDate('membership_fees.membership_payment_date', 'like', '%'.$date.'%')
            ->get();

            $pdf = PDF::loadView('reportPages.Print',compact('search','status','date','membership_data'));
            return $pdf->stream();
        // return view('reportPages.Print',compact('search','status','date','membership_data'));

      
    }
    public function index2()
    {
        return view('reportPages.index');
        // return view('reportPages.index', compact('classSchedules', 'select_exercises'));

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
        //
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
