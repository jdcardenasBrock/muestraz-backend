<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RenovacionMembresia extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;

    /**
     * Crea una nueva instancia del mensaje.
     */
    public function __construct($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * Obtiene el sobre del mensaje.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tu membresía vence en 5 días',
        );
    }

    /**
     * Obtiene la definición del contenido del mensaje.
     */
    public function content(): Content
    {
        return new Content(
            view: 'email.renovacion',
        );
    }
}
