<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserInfoRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AboutmeController extends Controller
{
    public function index()
    {
        $user = User::select(
            'id',
            'name',
            'email',
            'phone',
            'address',
            'job',
            'degree',
            'birth_day',
            'profile_pic',
            'experience'
        )->where('id', 1)->first();

        return view('admin.aboutme.index', compact('user'));
    }

    public function update(UpdateUserInfoRequest $request, User $user)
    {
        $validated = $request->validated();

        if ($request->hasfile('image')) {
            $get_new_file = $request->file('image')->store('images');
            $validated['profile_pic'] = $get_new_file;
        }

        $user->update($validated);

        return to_route('admin.aboutme.index')->with('message', 'Data Updated');
    }
}
