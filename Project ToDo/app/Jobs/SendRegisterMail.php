<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterEmail;
use App\Models\User;

class SendRegisterMail implements ShouldQueue {
    private $user;
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function handle(): void {
        $mail = new RegisterEmail($this->user);

        Mail::to($this->user->email)->send($mail);
    }
}
