<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->validated();
        $photo = $request->file('profile_photo_path');

        if ($photo) {
            $data['profile_photo_path'] = $photo->store('assets/user', 'public');
        }

        User::create($data);
        Session::flash('success', 'User berhasil disimpan');

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, User $user)
    {

        $data = $request->validated();
        $photo = $request->file('profile_photo_path');

        if ($photo) {
            $data['profile_photo_path'] = $photo->store('assets/user', 'public');
            Storage::disk('public')->delete($user->profile_photo_path ?? '');
        }

        $data['password'] = Hash::make($data['password']);
        $user->update($data);
        Session::flash('success', 'User berhasil diupdate');

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        Storage::disk('public')->delete($user->profile_photo_path ?? '');
        $user->delete();

        Session::flash('success', 'User berhasil dihapus');
        return redirect()->back();
    }

    public function login_view()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (Auth::attempt($request->only(['email', 'password']))) {

            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['Email atau password salah']);
    }

    public function register_view()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'password_repeat' => 'same:password',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Session::flash('success', 'Berhasil daftar, silahkan masuk');
        return redirect('/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
