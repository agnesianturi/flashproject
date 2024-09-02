<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function showAdmin()
    {
        $dataAdmin = User::select('name', 'email', 'id')
                    ->where('role', 'Admin')
                    ->get();

        return view('admin.admin_menu', compact('dataAdmin'));
    }

    public function showUser()
    {
        $dataUser = User::select('name', 'email', 'id')
                    ->where('role', 'User')
                    ->get();

        return view('admin.user_menu', compact('dataUser'));
    }

    public function home()
    {

    }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $referrer = $request->query('referrer');

        if($referrer == 'admin'){
            return view('admin.tambah_admin');
        } else{
            return view('admin.tambah_user');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        if ($user->role === 'Admin'){
            return redirect()->route('showAdmin')->with('success', 'Admin berhasil ditambahkan');
        } elseif ($user->role === 'User'){
            return redirect()->route('showUser')->with('success', 'User berhasil ditambahkan');
        }

        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $user = User::select('name', 'email', 'phone');
        return view('profile', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);
        $role = $user->role;
        if($role == 'Admin'){
            $user->delete();
            return redirect()->route('showAdmin')->with('success','Data Admin dihapus');
        } else{
            $user->delete();
            return redirect()->route('showUser')->with('success','Data User dihapus');
        }
    }
}
