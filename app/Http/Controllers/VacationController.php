<?php

namespace App\Http\Controllers;

use App\Models\Vacation;
use App\Models\Leave;
use App\Http\Requests\StoreVacationRequest;
use Illuminate\View\View;
use App\Http\Requests\UpdateVacationRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class VacationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        
        $users = User::where('name', 'Like', '%' . request()->input('search') . '%');
        if (request()->has('search')) {
            $vacation =Vacation::where('name', 'Like', '%' . request()->input('search') . '%')->paginate(5);
        } else {
            $vacation = Vacation::paginate(8);
        }

        return view('vacation.list', ['vacationList' => $vacation, 'users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('vacation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreVacationRequest $request)
    {
        //
        
        
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Vacation $vacation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacation $vacation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVacationRequest $request, Vacation $vacation)
    {
        $vacation = Vacation::find($id);

        if (!$vacation) {
            return redirect()->route('leave.index')->with('error', 'Vacation record not found');
        }
    
        $leave = Leave::where('user_id', $vacation->user_id)->first();
    
        if (!$leave) {
            return redirect()->route('leave.index')->with('error', 'Leave record not found');
        }
    
        $requestedDays = $leave->requested_days;
        $oldBalance = $vacation->balance;
    
        $newBalance = $oldBalance - $requestedDays + $increment;
        $vacation->balance = $newBalance;
        $vacation->save();
    
        return redirect()->route('leave.index')->with('success', 'Balance updated');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacation $vacation)
    {
        //
    }
}
