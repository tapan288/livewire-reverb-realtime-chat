<?php

namespace App\Livewire\Chat;

use App\Models\Room;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Database\Eloquent\Collection;

class Messages extends Component
{
    public Room $room;

    public Collection $messages;

    public function mount()
    {
        $this->fill([
            'messages' => $this->room->messages()
                ->with('user')
                ->latest()
                ->take(100)
                ->get(),
        ]);
    }

    #[On('message.created')]
    public function prependMessage($messageId)
    {
        $this->messages->prepend(
            \App\Models\Message::with('user')->find($messageId)
        );
    }

    public function render()
    {
        return view('livewire.chat.messages');
    }
}
