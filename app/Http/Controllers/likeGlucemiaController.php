<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Glucemia;
use App\Models\LikeGlucemia;
use Illuminate\Http\Request;

class likeGlucemiaController extends Controller
{
    
    public function index(User $user, Glucemia $glucemia, LikeGlucemia $like)
    {
        // $glucemia = Glucemia::where()
        $likes = $glucemia->likes;

        foreach($likes as $like){
            $like->user = User::find($like->user_id);
        }
        // dd($glucemia);



        return view('likeglucemia.index', [
            'user' => $user,
            'glucemia'=>$glucemia,
            'likes' => $likes


        ]);
    }
    public function show(Glucemia $glucemia)
    {
        $user = $glucemia->user;
        // dd($glucemia->user);
        return view('likeglucemia.show', [
            'user' => $user,
            'glucemia' => $glucemia,
        ]);
    }
    // public function store(Request $request, Glucemia $glucemia)
    // {
    //     // dd('Dando like');
    //     $glucemia->likes()->create([
    //         'user_id' => $request->user()->id,
    //     ]);

    //     return back();
    // }

    // public function destroy(Request $request, Glucemia $glucemia)
    // {
    //     // dd('Eliminando like');
    //     $request->user()->likes()->where('glucemia_id', $glucemia->id)->delete();

    //     return back();
    // }
}
