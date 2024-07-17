<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Historia;

class VerHistoria extends Component
{
    public $user;
    public $historia;
    public $isliked;
    public $likes;
    public function mount( $historia)
    {
        // $this->user = $user;
        $this->historia = $historia;
        $this->isliked = $historia->checkLike(auth()->user());
        $this->likes = $historia->likes->count();

        // return view('livewire.ver-historia', [
            //     'user' => $user,
            //     'historia' => $historia,
            // ]);
        }
        public function like()
        {
        // dd($this->user);
        
        if($this->historia->checkLike( auth()->user() )){
            $this->historia->likes()->where('historia_id', $this->historia->id)->delete();
            $this->isliked = false;
            $this->likes--;
            
        }else{
            $this->historia->likes()->create([
                'user_id' => auth()->user()->id,
            ]);
            $this->isliked = true;
            $this->likes++;
        }

        
    }
    public function render()
    {
        
        
        // $historia = Historia::where('user_id', auth()->user()->id)->get();
        return view('livewire.ver-historia', [
        ]);
    }
}
