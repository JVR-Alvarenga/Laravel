<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterEmail;

class SendRegisterMail implements ShouldQueue {
    private $user;
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(User $user) {
        $this->user = $user;
    }

    /**
     * Execute the job.
     */
    public function handle(): void {
        $registerMail = new RegisterEmail($this->user);
        
        Mail::to($this->user->email)->send($registerMail);
    }
}
