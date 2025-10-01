<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $isOpen = true;
    protected $listeners = ['toggle'];

    public function render()
    {
        if (session()->has('isOpen')) {
            $this->isOpen = session('isOpen');
        }

        return view('livewire.sidebar');
    }

    public function toggle()
    {
        $this->isOpen = !$this->isOpen;
        session()->put('isOpen', $this->isOpen);
    }
}
