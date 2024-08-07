<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Address;
use App\Models\User;

class RegisterEmail extends Mailable {
    private $user;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
            subject: 'Confirmação do Pedido',
            from: new Address('joaooficial@gmail.com', 'Joao Victor'),
            replyTo: [
                new Address('emailempresarial@teste.com', 'Loja Geek')
            ]
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {

        return new Content(
            view: 'mail.registerMail',
            with: ['name' => $this->user->name]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array {
        return [
            //Attachment::fromPath('../public/404-error.jpeg')
        ];
    }
}
