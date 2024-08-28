<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;
class SendEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Mail::to('noura@examole.com')->send(new SendEmail);
    }
}
