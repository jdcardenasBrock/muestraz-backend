<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class UserProfile extends Component
{
    public User $user;

    public function mount($id)
    {
        try {
            $decryptedId = Crypt::decrypt($id);
            $this->user = User::findOrFail($decryptedId);
        } catch (\Exception $e) {
            abort(404);
        }
    }
    public function render()
    {
        return view('livewire.admin.user-profile');
    }
}
