<?php

namespace App\Http\Controllers;

use App\Models\Vacation;
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
        
        $validated = $request->validate([
            
            'request period' => 'required|date',]);
        $validated["user_id"] = Auth::user()->id;
        $validated["user_id"] = Auth::user()->name;
        $validated["user_id"] = Auth::user()->email;
        $customer = Vacation::create($validated);
        if (isset($vacation)) {
            
            return redirect()->route('vacation.index')->with('success', 'Leave request created successfully');
        }
        return redirect()->back()->with('error', 'Error  Creation')->withInput();
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
        // update la variable balance 
        //$variable -> update($request->all());
        //$variable -> save()
         // récupérer ID puis récupere ligne de vacation dans la table vacation on accède l'ancienne balance 

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacation $vacation)
    {
        //
    }
}
