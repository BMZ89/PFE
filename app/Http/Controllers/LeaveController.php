<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\User;
use App\Models\Vacation;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreLeaveRequest;
use App\Http\Requests\UpdateLeaveRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class LeaveController extends Controller
{
    

   

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
    public function store(Request $request)
    {
        $data = $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
        ]);
        $data["user_id"] = Auth::user()->id;
        
        $leave = Leave::create($data);
        if (isset($leave)) {
            return redirect()->route('leave.index')->with('success', 'Request created successfully');
        }
        return redirect()->back()->with('error', '')->withInput();
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
    public function edit(string $id)
    {
        //
        $leave = Leave::find($id);
        return view('leave.edit', ['leave' => $leave]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $leave = Leave::find($id);
        $vacation = $leave->leaveRequest;

        // $leave->id = $request->id;

        if ($vacation) {
            $balance = $vacation->balance;
            
            if ($leave->requested_days < $balance) {
                $leave->is_validated = $request->input('is_validated') !== null ? true : false;
                
                if ($leave->is_validated) {
                    $leave->updated_at = now();
                } else {
                    $leave->updated_at = null;
                }
                
                $leave->save();
                return redirect()->route('leave.index')->with('success', 'Updated');
            } else {
                return redirect()->route('leave.index')->with('error', 'Insufficient balance for requested days');
            }
        } else {
            return redirect()->route('leave.index')->with('error', 'No vacation record found');
        }
        
        
        // $leave->requested_days = $request->input('requested_days');

        // if($leave->requested_days < $balance) {
        //     $leave->is_validated = $request->input('is_validated')  !== null ? true : false;

        //     if ($leave->is_validated) {
        //     $leave->updated_at = now();
        //     } else {
        //         $leave->updated_at = null;
        //     }
        // }
        
        // $leave->save();
        // return redirect()->route('leave.index')->with('success',' updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leave $leave)
    {
        //
    }
    }
