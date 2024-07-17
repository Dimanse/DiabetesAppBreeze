<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserFollowingsController extends Controller
{
    public function __invoke(User $user)
    {
        // dd($user->followings);

        $followings = $user->followings;

        return view('user.followings', [
            'followings' => $followings,
        ]);
    }
}
