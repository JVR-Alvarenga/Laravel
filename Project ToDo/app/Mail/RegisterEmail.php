<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Mail\Mailables\Address;

class RegisterEmail extends Mailable {
    private $user;
    use Queueable, SerializesModels;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function envelope(): Envelope {
        return new Envelope(
            subject: 'Email Registrado',
            from: new Address('testador@gmail.com', 'Testador de Mails')
        );
    }

    public function content(): Content {
        return new Content(
            view: 'mails.send_email',
            with: [
                'name' => $this->user->name
            ]
        );
    }

    public function attachments(): array {
        return [];
    }
}
