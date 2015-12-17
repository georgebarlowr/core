<?php

namespace App\Jobs\Mship\Security;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSecurityResetLinkEmail extends \App\Jobs\Job implements SelfHandling, ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

    private $recipient = null;
    private $password = null;

    public function __construct(\App\Models\Mship\Account $recipient, $password)
    {
        $this->recipient = $recipient;
        $this->password = $password;
    }

    public function handle(Mailer $mailer)
    {
        $displayFrom = "VATSIM UK - Community Department";
        $subject = "New Email Added - Verification Required";
        $body = \View::make("emails.mship.security.reset_password")
                     ->with("account", $this->recipient)
                     ->with("password", $this->password)
                     ->render();
        \Bus::dispatch(new \App\Jobs\Messages\CreateNewMessage(\App\Models\Mship\Account::find(VATUK_ACCOUNT_SYSTEM), $this->recipient, $subject, $body, $displayFrom, true, true));
    }
}
