<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (request()->has('search')) {
            $customer =Customer::where('name', 'Like', '%' . request()->input('search') . '%')->paginate(5);
        } else {
            $customer = Customer::paginate(8);
        }

        return view('customer.list', ['customerList' => $customer]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('customer.create');
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request):RedirectResponse
    {
        
    

        $validated = $request->validate([
            'name' => 'required|unique:customers',
            'adress' => 'required|max:255',
            'contact' => 'required',
            'activity' => 'required|max:25',
            'user id' =>'required',
        ]);
       
 
        return redirect('/customers');
        return to_route('customer.show', ['customer' => $customer->id]);
        
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
