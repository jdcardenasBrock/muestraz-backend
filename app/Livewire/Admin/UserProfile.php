<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class UserProfile extends Component
{
    public User $user;
    public $currentPage = 1;
    public $name, $mobile_phone, $gender, $email, $address, $city, $department,
        $type_document, $document_id, $born_date;


    public function mount($ut)
    {
        try {
            $decryptedId = Crypt::decrypt($ut);
            $this->user = User::with('profile')->where('id', $decryptedId)->first();
            $this->name = $this->user->name;
            $this->email = $this->user->email;
            if ($this->user->profile) {
                $this->mobile_phone = $this->user->profile->mobile_phone;
                $this->gender = $this->user->profile->gender;
                $this->address = $this->user->profile->address;
                $this->city = $this->user->profile->city;
                $this->department = $this->user->profile->department;
                $this->type_document = $this->user->profile->type_document;
                $this->document_id = $this->user->profile->document_id;
                $this->born_date = $this->user->profile->born_date;
            }
        } catch (\Exception $e) {
            abort(404);
        }
    }
    public function render()
    {
        return view('livewire.admin.user-profile');
    }


    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ]);

        // Actualizar datos del usuario
        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        // Si ya existe perfil, actualizarlo. Si no, crearlo.
        if ($this->user->profile) {
            $this->user->profile->update([
                'mobile_phone' => $this->mobile_phone,
                'gender' => $this->gender,
                'address' => $this->address,
                'city' => $this->city,
                'department' => $this->department,
                'type_document'=> $this->type_document,
                'document_id' => $this->document_id,
                'born_date' => $this->born_date,
            ]);
        } else {
            $this->user->profile()->create([
                'mobile_phone' => $this->mobile_phone,
                'gender' => $this->gender,
                'address' => $this->address,
                'city' => $this->city,
                'department' => $this->department,
                'type_document'=> $this->type_document,
                'document_id' => $this->document_id,
                'born_date' => $this->born_date,
            ]);
        }

        $this->currentPage = 1;
        session()->flash('message', 'Usuario actualizado correctamente.');
    }

    public function editProfile()
    {
        $this->currentPage = 2;
    }
    public function backUser()
    {
        $this->currentPage = 1;
    }
}
