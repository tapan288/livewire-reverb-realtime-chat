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

    public array $ids = [], $typingIds = [];

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

    #[On('echo-presence:chat.room.{room.id},joining')]
    public function setUsersJoining($user)
    {
        if (in_array($user['id'], $this->ids))
            return;

        $this->ids[] = $user['id'];
    }

    #[On('echo-private:chat.room.{room.id},.client-typing')]
    public function setTyping($user)
    {
        if (in_array($user['id'], $this->typingIds))
            return;

        $this->typingIds[] = $user['id'];
    }

    #[On('echo-presence:chat.room.{room.id},leaving')]
    public function setUsersLeaving($user)
    {
        $this->ids = array_filter($this->ids, function ($id) use ($user) {
            return $id !== $user['id'];
        });
    }

    #[On('echo-private:chat.room.{room.id},.client-typing-finished')]
    public function setFinishedTyping($user)
    {
        $this->typingIds = array_filter($this->typingIds, function ($id) use ($user) {
            return $id !== $user['id'];
        });
    }

    public function render()
    {
        return view('livewire.chat.online-users');
    }
}
