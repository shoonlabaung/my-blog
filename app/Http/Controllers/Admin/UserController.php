<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
        'name' => $request->name,
        'position' => $request->position,
         'office' => $request->office,
        'age' => $request->age,
       'salary' => $request->salary,
    
    ]);

    return redirect()->route('admin.users.index');
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
        $user = User::find($id);
        // $roles = Role::all();
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
        $user = User::find($id);
        $user->update($request->all());

        
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
 public function destroy(string $id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->route('admin.users.index')->with('success', 'User deleted successfully!');
}
}