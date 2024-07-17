<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserFollowersController extends Controller
{
    public function __invoke(User $user, Request $request )
    {

        $followers = $user->followers;
        // dd($followers);

        return view('user.followers', [
            'followers' => $followers,
            'user' => $user,
        ]);
    }
}
