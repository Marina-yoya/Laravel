<?php

namespace App\Console\Commands; 

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Models\User; 
use App\Mail\WelcomeEmail; 

class SendEmailToUsers extends Command
{
    protected $signature = 'email:send';
    protected $description = 'Send emails to all registered users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            Mail::to($user->email)->send(new WelcomeEmail($user));
        }

        $this->info('Emails sent to all users successfully.');
    }
}
