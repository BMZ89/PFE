<?php

namespace App\Http\Controllers;

use App\Models\DaysOff;
use App\Models\User;
use App\Http\Requests\StoreDaysOffRequest;
use App\Http\Requests\UpdateDaysOffRequest;
use Illuminate\Support\Facades\Auth;

class DaysOffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function daysoffview()
    {
        if (Auth::check()) {
            return back();
        }
        return view('auth.login');
    }
    public function index()
    {
        //
        // $daysOff = DaysOff::all();
        // return view('daysoff')->with('DaysOff' , $daysoff);
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
    public function store(StoreDaysOffRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DaysOff $daysOff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DaysOff $daysOff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDaysOffRequest $request, DaysOff $daysOff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DaysOff $daysOff)
    {
        //
    }
}
