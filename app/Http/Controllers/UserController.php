<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (request()->has('search')) {
            $users = User::where('name', 'Like', '%' . request()->input('search') . '%')->paginate(5);
        } else {
            $users = User::paginate(5);
        }

        return view('admin.user.list', ['userList' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
    }






    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string',

        ]);
        $data['admin_id'] = Auth::user()->id;
        $data['role'] = $request->role;
        $data['password'] = Hash::make('pass');

        /* 
        recuperation du fichier
        */

        if ($request->hasFile('profile')) {
            $fileName = $request->file('profile')->getClientOriginalName();
            $path = 'storage/' . $request->file('profile')->storeAs('profiles', $fileName, 'public');
            $data['profile'] = $path;
        }


        $user = User::create($data);


        if (isset($user)) {
            return redirect()->route('users.index')->with('success', 'User created successfully');
        }

        return redirect()->back()->with('error', 'Error in User Creation')->withInput();

    }





    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('admin.user.show', [
            'user' => User::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
       //
    }
}