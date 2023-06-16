<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use Carbon\Carbon;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $start_date = Carbon::parse();
        $end_date = Carbon::parse();
  
        $requested_days = $start_date->diffInDays($end_date);
   
        //  dd($requested_days);

        if (request()->has('search')) {
            $leave =Leave::where('name', 'Like', '%' . request()->input('search') . '%')->paginate(5);
        } else {
            $leave = Leave::paginate(8);
        }

        return view('leave.list', ['leaveList' => $leave]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('leave.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLeaveRequest $request)
    {
        //
        $validated = $request->validate([
            
            'start_date' => 'required|date_format:d/m/Y',
             'end_date' => 'required|date_format:d/m/Y'],
            'requested_days => ');
        $validated["user_id"] = Auth::user()->id;
        $validated["user_id"] = Auth::user()->name;
        $validated["user_id"] = Auth::user()->email;
        $leave = Leave::create($validated);
        if (isset($leave)) {
            
            return redirect()->route('leave.index')->with('success', 'Leave request created successfully');
        }
        return redirect()->back()->with('error', 'Error  Creation')->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLeaveRequest $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
