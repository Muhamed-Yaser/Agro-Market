<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $imageUrl = $user->image ? URL::to(Storage::url($user->image)) : null;

        return response()->json([
            'success' => true,
            'data' => [
                'name' => $user->name,
                'email' => $user->email,
                'image' => $imageUrl,
            ],
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ]);

        if ($request->has('name')) {
            $user->name = $request->name;
        }
        if ($request->has('email')) {
            $user->email = $request->email;
        }
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('image')) {
            // Delete the old image if exists
            if ($user->image) {
                Storage::delete($user->image);
            }
            // Store the new image
            $path = $request->file('image')->store('images');
            $user->image = $path;
        }

        $user->save();

        $imageUrl = $user->image ? URL::to(Storage::url($user->image)) : null;

        return response()->json([
            'success' => true,
            'message' => 'Profile updated successfully.',
            'data' => [
                'name' => $user->name,
                'email' => $user->email,
                'image_url' => $imageUrl,
            ],
        ]);
    }
}
