<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $user = $request->user();

        $old_image = $user->image;
        $data = $request->except('image');
        $newImage = $this->uploadImage($request);

        if ($newImage) {
            $data['image'] = $newImage; // Update the image path in the data array
        }

        $user->update($data);

        // Delete the old image if a new one is uploaded
        if ($old_image && $newImage && $old_image !== $newImage) {
            Storage::disk('public')->delete($old_image);
        }

        return redirect()->route('profile.edit')->with('status', 'Profile updated successfully');
    }

    protected function uploadImage(Request $request)
    {
        if (!$request->hasFile('image')) return null;

        $file = $request->file('image');
        $path = $file->store('images', 'public');
        return $path;
    }


    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
