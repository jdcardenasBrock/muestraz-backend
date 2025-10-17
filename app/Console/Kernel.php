<?php

namespace App\Console;

use App\Mail\RenovacionMembresia;
use App\Models\Membership;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Mail;



class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        //Mike: Se crea este codigo para enviar correos de renovación de membresía
        $schedule->call(function () {
            $fechaLimite = Carbon::now()->addDays(5)->toDateString();
            $clientes = Membership::whereDate('end_date', $fechaLimite)->get();

            foreach ($clientes as $cliente) {
                Mail::to($cliente->email)->send(new RenovacionMembresia($cliente));
            }
        })->daily(); // Se ejecutará una vez al día.
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    
}
