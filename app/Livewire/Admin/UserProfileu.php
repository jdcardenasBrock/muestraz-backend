<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use App\Models\Membership;
use App\Models\MembershipType;



class UserProfileu extends Component
{
    public User $user;
    public $name, $mobile_phone, $gender, $email, $address, $city_id, $state_id,
        $type_document, $document_id, $born_date, $state, $city,
        $maritalstatus, $children, $pet, $vehicletype, $membership, $usermembership, $membershipid, $id,
        $membershiptype;

    protected $rules = [
        'name'          => 'required|string|max:255',
        'mobile_phone'  => 'required|string|max:255',
        'email'   => 'required|string|max:255',
        'type_document'       => 'required|string|max:255',
        'document_id'       => 'required|string|max:255',
        'address'       => 'required|string|max:255',
        'state_id'     => 'required',
        'city_id'      => 'required',
        'gender'        => 'required|string|max:255',
        'born_date'    => 'required|date',
        'maritalstatus' => 'required|string|max:255',
        'vehicletype'   => 'required|string|max:255',
        'children'      => 'nullable|boolean',
        'pet'           => 'nullable|boolean',
        
    ];

    public function mount($ut)
    {
        try {
            $this->state = State::orderBy('nombre')->get();
            $this->city = City::orderBy('nombre')->get();
            $this->membership = Membership::OrderBy('user_id')->get();
            $this->membershiptype = MembershipType::where('type', "Basica")->first();

            $decryptedId = Crypt::decrypt($ut);
            $this->user = User::with('profile')->where('id', $decryptedId)->first();
            $this->name = $this->user->name;
            $this->email = $this->user->email;

            $this->usermembership = Membership::where('user_id', $decryptedId)->first();

            if ($this->user->profile) 
            {
                $this->mobile_phone = $this->user->profile->mobile_phone;
                $this->gender = $this->user->profile->gender;
                $this->address = $this->user->profile->address;
                $this->state_id = $this->user->profile->state_id;
                $this->city_id = $this->user->profile->city_id;
                $this->type_document = $this->user->profile->type_document;
                $this->document_id = $this->user->profile->document_id;
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
        try {
            $this->validate();

            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);

            if ($this->user->profile) {
                $this->user->profile->update([
                    'mobile_phone' => $this->mobile_phone,
                    'gender' => $this->gender,
                    'address' => $this->address,
                    'state_id' => $this->state_id,
                    'city_id' => $this->city_id,
                    'type_document' => $this->type_document,
                    'document_id' => $this->document_id,
                    'born_date' => $this->born_date,
                    'maritalstatus' => $this->maritalstatus,
                    'vehicletype' => $this->vehicletype,
                    'children' => $this->children,
                    'pet' => $this->pet,
                ]);

                if ($this->usermembership == NULL) {
                    $membership = Membership::Create(
                        [
                            'user_id' => $this->user->id,
                            'membershiptype_id' => $this->membershiptype->id,
                        ]
                    );
                }
            } else {
                $this->user->profile()->create([
                    'mobile_phone' => $this->mobile_phone,
                    'gender' => $this->gender,
                    'address' => $this->address,
                    'state_id' => $this->state_id,
                    'city_id' => $this->city_id,
                    'type_document' => $this->type_document,
                    'document_id' => $this->document_id,
                    'born_date' => $this->born_date,
                    'maritalstatus' => $this->maritalstatus,
                    'vehicletype' => $this->vehicletype,
                    'children' => $this->children,
                    'pet' => $this->pet,
                ]);
            }
            session()->flash('success', 'Usuario guardado correctamente ✅');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al guardar el usuario: ' . $e->getMessage());
        }
    }
}
