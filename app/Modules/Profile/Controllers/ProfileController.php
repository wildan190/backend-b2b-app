<?php

namespace App\Modules\Profile\Controllers;

use App\Modules\Profile\Action\GetProfileAction;
use App\Modules\Profile\Action\UpdateProfileAction;
use App\Modules\Profile\Request\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index(GetProfileAction $action)
    {
        $user = $action->execute(Auth::id());
        return view('pages.admin.profiles.index', compact('user'));
    }

    public function edit(GetProfileAction $action)
    {
        $user = $action->execute(Auth::id());
        return view('pages.admin.profiles.edit', compact('user'));
    }

    public function update(ProfileRequest $request, UpdateProfileAction $action)
    {
        $data = $request->validated();
        $action->execute(Auth::id(), $data);
        return redirect()->route('profile.index')->with('success', 'Profile updated successfully');
    }
}
