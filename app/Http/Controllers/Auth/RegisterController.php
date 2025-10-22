<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Membership;
use App\Models\MembershipType;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected function redirectTo(): string
    {
        // Al registrarse, si aún no verificó email lo enviamos a verify
        if (is_null(Auth::user()->email_verified_at)) {
            return '/email/verify';
        }

        // Si ya tiene email verificado (poco común en registro, pero por si acaso)
        return RouteServiceProvider::redirectToHome(Auth::user());
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     * @return \App\Models\Membership
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status_account' => 'pending',
            'account_type' => 'user',
        ]);

        // Asignar membresía gratuita si existe
        $freeMembership = MembershipType::where('memberType', 'free')->first();

        if ($freeMembership) {
            Membership::create([
                'user_id' => $user->id,
                'membershiptype_id' => $freeMembership->id,
                'begin_date' => Carbon::now(),
                'end_date' => Carbon::now()->addMonths($freeMembership->quantitymonths ?? 1),
            ]);
        }

        // Disparar evento
        event(new Registered($user));

        // Retornar el usuario recién creado
        return $user;
    }
}
