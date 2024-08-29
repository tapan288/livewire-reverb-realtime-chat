<?php

namespace App\Livewire\Chat;

use App\Models\Room;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\Attributes\On;
use Livewire\Attributes\Computed;

class OnlineUsers extends Component
{
    public Room $room;

    public array $ids = [];

    #[Computed()]
    public function users()
    {
        return User::find($this->ids);
    }

    #[On('echo-presence:chat.room.{room.id},here')]
    public function setUsersHere($users)
    {
        $this->ids = Arr::pluck($users, 'id');
    }

    public function render()
    {
        return view('livewire.chat.online-users');
    }
}
