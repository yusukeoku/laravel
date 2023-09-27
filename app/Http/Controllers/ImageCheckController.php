<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageCheckRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ImageCheckController extends Controller
{
    /**
    * Display the user's profile form.
    */
    public function edit(Request $request): View
    {
        return view('dashboard', [
            'imagecheck' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile image.
     */
    public function update(ImageCheckRequest $request): RedirectResponse
    {
        $path = null;
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $request->user()->imagecheck_path = $path;
        }

        $request->user()->save();

        return Redirect::route('imagecheck.edit')->with('status', 'imagecheck-updated');
    }
}
