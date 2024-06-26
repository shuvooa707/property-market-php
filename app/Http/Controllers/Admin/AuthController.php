<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function loginPage()
    {
        return view("admin.auth.login");
    }
    public function registerPage()
    {
        return view("admin.auth.register");
    }
    public function login(Request $request)
    {
        $auth = Auth::attempt([
            "email" => $request->get("email"),
            "password" => $request->get("password"),
            "role" => "Admin"
        ]);

        if ( $auth ) {
            return redirect()->route("admin.dashboard");
        }


        return redirect()->back();
    }

    public function register(Request $request)
    {
        $user = User::create([
            "name" => $request->get("name"),
            "email" => $request->get("email"),
            "password" => Hash::make($request->get("password"))
        ]);

        $image = $request->file("image");
        $filename = Str::uuid() . "." . $image->getClientOriginalExtension();
        $image->store("/uploads/" . $filename);

        Auth::login($user);

        return redirect()->route("home");
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route("home");
    }
}
