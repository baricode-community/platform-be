<?php

namespace App\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $isOpen = false;

    public function toggleSidebar()
    {
        $this->isOpen = !$this->isOpen;
    }

    public function closeSidebar()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
