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
    public $sitio = '';
    public $numero1 = '';
    public $numero2 = '';
    public $numero3 = '';
    public $adicional = '';


    protected $rules = [
        'name'          => 'required|string|max:255',
        'mobile_phone'  => 'required|string|max:255',
        'email'         => 'required|string|max:255',
        'type_document' => 'required|string|max:255',
        'document_id'   => 'required|string|max:255',
        'address'       => 'required|string|max:255',
        'state_id'      => 'required',
        'city_id'       => 'required',
        'gender'        => 'required|string|max:255',
        'born_date'     => 'required|date',
        'maritalstatus' => 'nullable|string|max:255',
        'vehicletype'   => 'nullable|string|max:255',
        'children'      => 'nullable|boolean',
        'pet'           => 'nullable|boolean',
    ];

    protected $messages = [
        'name.required'          => 'El nombre completo es obligatorio.',
        'name.string'            => 'El nombre completo debe ser un texto válido.',
        'name.max'               => 'El nombre completo no puede exceder 255 caracteres.',

        'mobile_phone.required'  => 'El número de celular es obligatorio.',
        'mobile_phone.string'    => 'El número de celular debe ser un texto válido.',
        'mobile_phone.max'       => 'El número de celular no puede exceder 255 caracteres.',

        'email.required'         => 'El correo electrónico es obligatorio.',
        'email.string'           => 'El correo electrónico debe ser un texto válido.',
        'email.max'              => 'El correo electrónico no puede exceder 255 caracteres.',

        'type_document.required' => 'El tipo de documento es obligatorio.',
        'type_document.string'   => 'El tipo de documento debe ser un texto válido.',
        'type_document.max'      => 'El tipo de documento no puede exceder 255 caracteres.',

        'document_id.required'   => 'El número de documento es obligatorio.',
        'document_id.string'     => 'El número de documento debe ser un texto válido.',
        'document_id.max'        => 'El número de documento no puede exceder 255 caracteres.',

        'address.required'       => 'La dirección física es obligatoria.',
        'address.string'         => 'La dirección física debe ser un texto válido.',
        'address.max'            => 'La dirección física no puede exceder 255 caracteres.',

        'state_id.required'      => 'El departamento es obligatorio.',
        'city_id.required'       => 'La ciudad es obligatoria.',

        'gender.required'        => 'El género es obligatorio.',
        'gender.string'          => 'El género debe ser un texto válido.',
        'gender.max'             => 'El género no puede exceder 255 caracteres.',

        'born_date.required'     => 'La fecha de nacimiento es obligatoria.',
        'born_date.date'         => 'La fecha de nacimiento debe ser válida.',

        'maritalstatus.string'   => 'El estado civil debe ser un texto válido.',
        'maritalstatus.max'      => 'El estado civil no puede exceder 255 caracteres.',

        'vehicletype.string'     => 'El tipo de vehículo debe ser un texto válido.',
        'vehicletype.max'        => 'El tipo de vehículo no puede exceder 255 caracteres.',

        'children.boolean'        => 'El valor de hijos debe ser verdadero o falso.',
        'pet.boolean'             => 'El valor de mascotas debe ser verdadero o falso.',
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

            if ($this->user->profile) {
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

    public function armarDireccion()
    {
        // Solo arma si hay al menos un campo
        if ($this->sitio && $this->numero1 && $this->numero2) {
            $this->address = trim("{$this->sitio} {$this->numero1} # {$this->numero2} - {$this->numero3} {$this->adicional}");
        } else {
            $this->address = '';
        }
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
