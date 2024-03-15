<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('backend.pages.settings.profile.profile', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse {
        $user = $request->user();
        $user->fill($request->validated());
    
        if ($request->filled('password')) {
            // Validate password confirmation
            $request->validate([
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
    
            // Hash the new password
            $user->password = Hash::make($request->password);

            $user->save();
    
            return redirect()->route('profile.edit')->with('status', 'password-updated');
        }
    
        // If the email is changed, reset email verification
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }
    
        // Save the changes
        $user->save();
    
        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }
}