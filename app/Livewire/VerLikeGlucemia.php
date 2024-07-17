<?php

namespace App\Livewire;

use Livewire\Component;

class VerLikeGlucemia extends Component
{
    public $user;
    public $glucemia;
    public $isliked;
    public $likes;
    public function mount($glucemia, $user)
    {
        $this->user = $user;
        $this->glucemia = $glucemia;
        $this->isliked = $glucemia->checkLike(auth()->user());
        $this->likes = $glucemia->likes->count();

        // dd($user);
        
        }
        public function like()
        {
        // dd($this->user);
        
        if($this->glucemia->checkLike( auth()->user() )){
            $this->glucemia->likes()->where('glucemia_id', $this->glucemia->id)->delete();
            $this->isliked = false;
            $this->likes--;
            
        }else{
            $this->glucemia->likes()->create([
                'user_id' => auth()->user()->id,
            ]);
            $this->isliked = true;
            $this->likes++;
        }

        
    }
    public function render()
    {
        return view('livewire.ver-like-glucemia');
    }
}
