<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Historia;

class LikeHistoria extends Component
{
    public $user;
    public $historia;
    public $isliked;
    public $likes;

    public function mount( $historia, $user)
    {
        $this->isliked = $historia->checkLike(auth()->user());
        $this->likes = $historia->likes->count();
    }

    public function like()
    {
        if($this->historia->checkLike( auth()->user() )){
            $this->historia->likes()->where('historia_id', $this->historia->id)->delete();
            $this->isliked = false;
            $this->likes--;
            return back();
        }else{
            $this->historia->likes()->create([
                'user_id' => auth()->user()->id,
            ]);
            $this->isliked = true;
            $this->likes++;
            return back();
        }

        
    }
    
    public function render()
    {
        return view('livewire.like-historia');
    }
}
