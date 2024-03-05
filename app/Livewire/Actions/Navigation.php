<?php

namespace App\Http\Livewire;

use App\Livewire\Actions\Logout;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Navigation extends Component
{
    public string $userName;

    protected $listeners = ['profile-updated' => '$refresh'];

    public function mount()
    {
        $this->userName = Auth::user()->name;
    }

    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.navigation');
    }
}
