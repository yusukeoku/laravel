<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileImageUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileImageController extends Controller
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
     * Update the user's profile image.
     */
    public function update(ProfileImageUpdateRequest $request): RedirectResponse
    {
        $path = null;
        if ($request->hasFile('picture')) {
            $path = $request->file('picture')->store('images', 'public');
            $request->user()->profile_photo_path = $path;
        }

        $request->user()->save();

        return Redirect::route('profileimage.edit')->with('status', 'profileimage-updated');
    }
}
