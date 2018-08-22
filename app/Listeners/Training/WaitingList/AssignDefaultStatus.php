<?php

namespace App\Listeners\Training\WaitingList;

use App\Events\Training\AccountAddedToWaitingList;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class AssignDefaultStatus
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AccountAddedToWaitingList  $event
     * @return void
     */
    public function handle(AccountAddedToWaitingList $event)
    {
        Log::channel('training')
            ->info("Account {$event->account} ({$event->account->id}) was added to {$event->waitingList} by {$event->staffAccount} ({$event->staffAccount->id})");
    }
}
