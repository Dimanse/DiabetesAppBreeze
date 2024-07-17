<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Historia;
use App\Models\LikeHistoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoriaController extends Controller
{
    
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $historia = Historia::where('user_id', auth()->user()->id)->get();
        // dd($historia[0]);
        return view('historia.index', [
            'user' => $user,
            'historia' => $historia[0],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::find(auth()->user()->id);
        return view('historia.create', [
            'user' => $user,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // $user = User::find(auth()->user()->id);
        // $historias = DB::table('historias')->get();
        $historia = $user->historia;

        
        // dd($user);
        return view('historia.show', [
            'user' => $user,
            'historia'=>$historia,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Historia $historia)
    {
        $user = User::find(auth()->user()->id);
        // dd($historia);
        return view('historia.edit', [
            'user' => $user,
            'historia' => $historia,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
