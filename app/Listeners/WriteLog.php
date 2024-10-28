<?php

namespace App\Listeners;

use App\Events\OrderPlaces;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class WriteLog
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
     * @param  \App\Events\OrderPlaces  $event
     * @return void
     */
    public function handle(OrderPlaces $event)
    {
        Log::info('Listener bir isdeyir!');
    }
}
