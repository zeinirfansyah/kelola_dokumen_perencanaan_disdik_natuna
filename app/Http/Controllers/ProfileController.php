<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view('admin.profile.index', compact('user'));
    }

    public function updateProfile()
    {
        $user = auth()->user();
        return view('admin.profile.update', compact('user'));
    }

    public function editProfile(Request $request)
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Validation rules
        $rules = [
            'nama_user' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:255|unique:users,no_telepon,' . auth()->user()->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->user()->id,
            'avatar' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];

        // Add password validation rules only if a new password is provided
        if ($request->filled('password')) {
            $rules['password'] = 'required|string|min:8';
        }

        // Validate the request
        $validate = $request->validate($rules, [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah ada.',
            'string' => ':attribute harus string.',
            'max' => ':attribute maksimal 255 karakter.',
            'min' => ':attribute minimal 8 karakter.',
            'email' => ':attribute harus email.',
            'image' => ':attribute harus jpeg, png, jpg.',
            'mimes' => ':attribute harus jpeg, png, jpg.',
            'max' => ':attribute maksimal 2 MB.',
            'regex' => 'pastikan :attribute hanya diisi oleh huruf dan angka.',
        ]);

        // Handle file upload
        $currentAvatar = $user->avatar;
        $filename = $this->handleAvatarUpload($request, $currentAvatar);

        // Update user data
        $userData = [
            'nama_user' => $request->nama_user,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'avatar' => $filename,
            'updated_at' => now(),
        ];

        // Add password to the update array only if a new password is provided
        if ($request->filled('password')) {
            $userData['password'] = Hash::make($request->password);
        }

        User::where('id', $user->id)->update($userData);

        return redirect()->route('profile.show', ['id' => $user->id])->with('success', 'User data updated successfully');
    }


    private function handleAvatarUpload(Request $request, $currentAvatar)
    {
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();

            // Save the new file in the 'public/avatars' directory
            $avatar->storeAs('public/avatars', $filename);

            // Delete the old avatar if it exists and is not the default avatar
            if ($currentAvatar && $currentAvatar !== 'default_avatar.jpg') {
                $oldAvatarPath = storage_path('app/public/avatars/' . $currentAvatar);

                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }

            return $filename; // Return the generated filename for the new avatar
        }

        // If no new avatar file is provided, return the current avatar filename
        return $currentAvatar;
    }
}
