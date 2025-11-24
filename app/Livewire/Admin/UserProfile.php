<?php

namespace App\Livewire\Admin;

use App\Models\User;
use App\Models\State;
use App\Models\City;
use App\Models\QuizAnswer;
use App\Models\QuizOption;
use App\Models\QuizQuestion;
use App\Models\Membership;
use App\Models\MembershipType;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class UserProfile extends Component
{
    public User $user;    
    public $currentPage = 1;
    public $name, $mobile_phone, $gender, $email, $address, $city_id, $state_id,
        $type_document, $document_id, $born_date, $state, $city,
        $question_id, $option_id, $answer_text, $user_id, $useranswer, $question,
        $maritalstatus, $children, $pet, $vehicletype,
        $membership, $usermembership, $membershipid,$userid,$membershiptype,$membershiptype_id,
        $usermembershiptype,$usermembershiptype_user;


    public function mount($ut)
    {
        
        {

            $this->state = State::orderBy('nombre')->get();
            $this->city = City::orderBy('nombre')->get();

            //Para mostrar los resultados de la encuestas en cada usuario
            $this->question = QuizQuestion::OrderBy('question')->get();
            $this->question = QuizOption::OrderBy('option_text')->get();

            //Para mostrar los datos de la Membresia
            $this->membership = Membership::OrderBy('user_id')->get();

            $decryptedId = Crypt::decrypt($ut);
            $this->user = User::with('profile')->where('id', $decryptedId)->first();
            $this->name = $this->user->name;
            $this->email = $this->user->email;
            $this->userid = $this->user->id;

            //Para mostrar los resultados de la encuestas en cada usuario
            $this->useranswer = QuizAnswer::where('user_id',$decryptedId)->get();
            //Para mostrar los datos de la membresia del usuario usermembership
            $this->usermembership = Membership::where('user_id',$decryptedId)->first();          

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
                
                //Para mostrar el tipo de membresia del usuario, solo cuando existe por
                //eso se pone en este if
                $this->usermembershiptype = MembershipType::where('id',$this->usermembership->membershiptype_id)->first();
            }

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
