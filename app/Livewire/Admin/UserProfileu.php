<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use App\Models\Membership;
use App\Models\Membershiptype;



class UserProfileu extends Component
{
    public User $user;
    public $name, $mobile_phone, $gender, $email, $address, $city_id, $state_id,
        $type_document, $document_id, $born_date, $state, $city,
        $maritalstatus, $children, $pet, $vehicletype,$membership, $usermembership, $membershipid, $id,
        $membershiptype;


    public function mount($ut)
    {
        try {

            $this->state = State::orderBy('nombre')->get();
            $this->city = City::orderBy('nombre')->get();
            $this->membership = Membership::OrderBy('user_id')->get();
            $this->membershiptype = Membershiptype::where('type',"Basica")->first();
                

            $decryptedId = Crypt::decrypt($ut);
            $this->user = User::with('profile')->where('id', $decryptedId)->first();
            $this->name = $this->user->name;
            $this->email = $this->user->email;
            
           
            $this->usermembership = Membership::where('user_id',$decryptedId)->first();
            
            
            if ($this->user->profile) {
                $this->mobile_phone = $this->user->profile->mobile_phone;
                $this->gender = $this->user->profile->gender;
                $this->address = $this->user->profile->address;
                $this->state_id = $this->user->profile->state_id;
                $this->city_id = $this->user->profile->city_id;
                $this->document_id = $this->user->profile->document_id;
                $this->type_document = $this->user->profile->type_document;
                $this->born_date = $this->user->profile->born_date;
                $this->maritalstatus = $this->user->profile->maritalstatus;
                $this->children = $this->user->profile->children;
                $this->pet = $this->user->profile->pet;
                $this->vehicletype = $this->user->profile->vehicletype;
            }

        } catch (\Exception $e) {
            abort(404);
        }


    }
    public function render()
    {
        return view('livewire.admin.user-profileu');
    }


    public function submit()
    {
        try{
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
                    'state_id' => $this->state_id,
                    'city_id' => $this->city_id,
                    'type_document'=> $this->type_document,
                    'document_id' => $this->document_id,
                    'born_date' => $this->born_date,
                    'maritalstatus' => $this->maritalstatus,
                    'children' => $this->children,
                    'pet' => $this->pet,
                    'vehicletype' => $this->vehicletype,
                ]);

                    //Para crear el registro de la membresia basica solo la primera
                    //vez que actualice sus datos
                    if ($this->usermembership==NULL) {
                     $membership = Membership::Create(
                    [
                        'user_id' => $this->user->id,
                        'membershiptype_id' => $this->membershiptype->id,                        
                    ]);
                }
            } else {
                $this->user->profile()->create([
                    'mobile_phone' => $this->mobile_phone,
                    'gender' => $this->gender,
                    'address' => $this->address,
                    'state_id' => $this->state_id,
                    'city_id' => $this->city_id,
                    'type_document'=> $this->type_document,
                    'document_id' => $this->document_id,
                    'born_date' => $this->born_date,
                    'maritalstatus' => $this->maritalstatus,
                    'children' => $this->children,
                    'pet' => $this->pet,
                    'vehicletype' => $this->vehicletype,
                ]);    
            }
    session()->flash('success', 'Producto guardado correctamente ✅');
       } catch (\Exception $e) {
           session()->flash('error', 'Error al guardar el producto: ' . $e->getMessage());
        }
    }
}

       


