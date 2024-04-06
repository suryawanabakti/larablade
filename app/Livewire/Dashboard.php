<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class Dashboard extends Component
{
    protected $users = [];
    public function render()
    {
        $users = User::all();
        if (!empty($this->users)) {
            $users = $this->users;
        }
        return view('livewire.dashboard', [
            "users" => $users
        ]);
    }

    #[On('echo:dashboard,OrderShipped')]
    public function dump($payload)
    {
        dd($payload);
    }
}
