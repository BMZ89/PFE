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
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'name' => 'required|unique:customers',
            'adress' => 'required|max:255',
            'contact' => 'required',
            'activity' => 'required|max:25',]);
        $validated["user_id"] = Auth::user()->id;
        $customer = Customer::create($validated);
        if ( auth()->user()->role == 'employee') 
        if (isset($customer)) {
            
            return redirect()->route('customer.index')->with('success', 'Customer created successfully');
        }
        return redirect()->back()->with('error', 'Error  Creation')->withInput();
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
        $customer = Customer::find($id);
        return view('customer.edit', ['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
       // if ( auth()->user()->role == 'manager') 
        $customer = Customer::find($id);
        $data = $request->validate([
            'name' => 'required|string|max:100',
        ]);

        $customer->name = $request->name;
        
        $customer->is_validated = $request->input('is_validated')  !== null ? true : false;
        // dd($request->input('is_validated'));
    //    dd($customer->is_validated);
    //    dd($customer->id);
        if ($customer->is_validated) {
            $customer->updated_at = now();
        } else {
            $customer->updated_at = null;
        }

        $customer->user_id = Auth::user()->id;
        // dd($customer);
        // Customer::update($customer);
        
        $customer->save();
        return redirect()->route('customer.index')->with('success','customer updated');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
