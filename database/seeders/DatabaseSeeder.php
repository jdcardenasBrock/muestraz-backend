<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Membership;
use App\Models\MembershipType;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        MembershipType::firstOrCreate(
            ['memberType' => 'free'],
            [
                'type' => 'Básica',
                'value' => 0,
                'quantitysamples' => 3,
                'quantitymonths' => 12,
                'image_path' => 'memberships/03vEzMOiqTtzdvFHMvc2pKwFHketGN6GMczpxFFz.png',
            ]
        );

        // Puedes agregar más tipos si deseas
        MembershipType::firstOrCreate(
            ['memberType' => 'paid'],
            [
                'type' => 'Premium',
                'value' => 48000,
                'quantitysamples' => 8,
                'quantitymonths' => 12,
                'image_path' => 'memberships/03vEzMOiqTtzdvFHMvc2pKwFHketGN6GMczpxFFz.png',
            ]
        );
        MembershipType::firstOrCreate(
            ['memberType' => 'paid'],
            [
                'type' => 'VIP',
                'value' => 78000,
                'quantitysamples' => 12,
                'quantitymonths' => 12,
                'image_path' => 'memberships/03vEzMOiqTtzdvFHMvc2pKwFHketGN6GMczpxFFz.png',
            ]
        );

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@root.com',
            'password' => Hash::make('A.123456'),
            'email_verified_at' => now(),
            'account_type' => 'admin',
            'created_at' => now(),
        ]);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'mpaez0105@gmail.com',
            'password' => Hash::make('A.123456'),
            'email_verified_at' => now(),
            'account_type' => 'admin',
            'created_at' => now(),
        ]);
        // Buscar membresía básica o gratuita
        $freeType = \App\Models\MembershipType::where('memberType', 'free')->first();

        // Si existe, crear la membresía asociada
        if ($freeType) {
            \App\Models\Membership::firstOrCreate([
                'user_id' => $admin->id,
                'membershiptype_id' => $freeType->id,
            ], [
                'begin_date' => now(),
                'end_date' => now()->addMonths($freeType->quantitymonths ?? 12),
            ]);
        }
        

        $this->call([
            CategorySeeder::class,
            ProductsSeeder::class,
        ]);
    }
}
