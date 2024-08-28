<?php

namespace App\Livewire\Chat\Pages;

use App\Models\Room;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\Rule;

class RoomShow extends Component
{
    public Room $room;

    #[Rule('required')]
    public string $body = '';

    public function submit()
    {
        $this->validate();

        $message = Message::make($this->only('body'));
        $message->user()->associate(auth()->user());
        $message->room()->associate($this->room);

        $message->save();

        $this->reset(['body']);
    }

    public function render()
    {
        return view('livewire.chat.pages.room-show')
            ->title($this->room->name . " Room");
    }
}
