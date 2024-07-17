<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // dd('Desde notification controller');
        $user = User::find(auth()->user()->id);
        $notificaciones = auth()->user()->unReadNotifications;

        //limpiar notificaciones
        auth()->user()->unReadNotifications->markAsRead();
        return view('notificaciones.index', [
            'user' => $user,
            'notificaciones' => $notificaciones,
        ]);
    }
}
