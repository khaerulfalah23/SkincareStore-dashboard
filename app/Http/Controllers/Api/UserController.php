<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function fetch(Request $request)
    {
        return $this->api($request->user(), 'Data profile user berhasil diambil');
    }

    public function login(Request $request)
    {
        try {
            $request->validate([
                'email' => 'email|required',
                'password' => 'required'
            ]);

            $user = User::firstWhere('email', $request->email);

            if (!$user || !Hash::check($request->password, $user->password)) {
                return $this->api(null, 'Email atau password salah', 401);
            }

            return $this->api([
                'access_token' => $user->createToken('authToken')->plainTextToken,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'Authenticated');
        } catch (ValidationException $e) {
            return $this->api($e->errors(), 'Kesalahan input', 500);
        } catch (Exception $e) {
            return $this->api($e->getMessage(), 'Something went wrong', 500);
        }
    }

    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'houseNumber' => $request->houseNumber,
                'phoneNumber' => $request->phoneNumber,
                'city' => $request->city,
                'password' => Hash::make($request->password),
            ]);

            return $this->api([
                'access_token' => $user->createToken('authToken')->plainTextToken,
                'token_type' => 'Bearer',
                'user' => $user,
            ], 'User registered');
        } catch (ValidationException $e) {
            return $this->api($e->errors(), 'Kesalahan input', 500);
        } catch (Exception $e) {
            return $this->api($e->getMessage(), 'Something went wrong', 500);
        }
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return $this->api(null, 'Token revoked');
    }

    public function updateProfile(Request $request)
    {
        $user = $request->user()->update($request->all());
        return $this->api($user, 'Profile updated');
    }

    public function updatePhoto(Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048',
        ]);

        $photo = $request->file('file');

        if (!$photo) {
            return $this->api(null, 'No photo', 400);
        }

        $user = $request->user();
        $file = $photo->store('assets/user', 'public');

        Storage::disk('public')->delete($user->profile_photo_path ?? '');
        $user->update(['profile_photo_path' => $file]);

        return $this->api($file, 'File uploaded');
    }
}
