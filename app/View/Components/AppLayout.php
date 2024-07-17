<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\View\Component;

class AppLayout extends Component
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
        // dd($user);
    }
    public function render(): View
    {
        // dd($this->user);
        return view('layouts.app');
    }
}
