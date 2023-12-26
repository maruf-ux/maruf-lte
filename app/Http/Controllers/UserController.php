<?php

namespace App\Http\Controllers;

use App\Models\User;
use Session;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        return view('pages.index');
    }

    public function login(): View
    {
        return view('pages.sign-in');
    }

    public function loginPost(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('dashboard');
        }
        return redirect('/sign-in');
    }

    public function register(): View
    {
        return view('pages.registration');
    }

    public function registerPost(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        return redirect('sign-in');
    }

    public function create(array $data): array
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }
    public function dashboard(): RedirectResponse|View
    {
        if (Auth::check()) {
            return view('pages.dashboard');
        }
        return redirect('sign-in');
    }
    public function logout(): RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect("/");
    }
}
