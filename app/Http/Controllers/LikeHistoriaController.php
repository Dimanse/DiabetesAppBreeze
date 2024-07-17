<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Genero;
use App\Models\Historia;
use App\Models\LikeHistoria;
use Illuminate\Http\Request;

class LikeHistoriaController extends Controller
{
    public function index(Historia $historia, LikeHistoria $like)
    {
        $likes = $historia->likes;

        foreach($likes as $like){
            $like->user = User::find($like->user_id);
        }
        // dd(auth()->user());



        return view('history.index', [
            
            'historia'=>$historia,
            'likes' => $likes


        ]);
    }

    public function store(Request $request, Historia $historia)
    {
        // dd('Dando like');
        $historia->likes()->create([
            'user_id' => $request->user()->id,
        ]);

        return back();
    }

    public function destroy(Request $request, Historia $historia)
    {
        // dd('Eliminando like');
        $request->user()->likes()->where('historia_id', $historia->id)->delete();

        return back();
    }
}
