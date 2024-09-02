<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GuestController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'role' => 'required|in:Admin,User',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // dd($credentials);

        $user = User::where('email', $credentials['email'])->where('role', $credentials['role'])->first();

        if(!$user){
            return back()->withErrors([
                'email' => 'Email Anda tidak terdaftar',
            ])->onlyInput('email');
        }

        if ($user && Hash::check($request->password, $user->password)){
            Auth::login($user);
            
            return redirect()->route('home', compact('user'));
        }

        return back()->withErrors([
            'email' => 'Kredensial tidak sesuai',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            return view('home', compact('user'));
        }

        return view('home');
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
    public function store(Request $request)
    {
        //
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
