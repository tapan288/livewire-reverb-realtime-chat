<?php

namespace App\Livewire\Chat\Pages;

use App\Models\Room;
use Livewire\Component;

class RoomShow extends Component
{
    public Room $room;

    public function render()
    {
        return view('livewire.chat.pages.room-show')
            ->title($this->room->name . " Room");
    }
}
