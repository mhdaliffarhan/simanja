<?php

namespace App\Livewire;

use Livewire\Component;

class Nilai extends Component
{
    public function mount($id) {}

    public function render()
    {
        return view('livewire.nilai')->layout('layouts.app');
    }
}
