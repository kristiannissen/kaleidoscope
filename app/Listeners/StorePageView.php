<?php

namespace App\Listeners;

use App\Events\PageViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class StorePageView
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
     * @param  PageViewed  $event
     * @return void
     */
    public function handle(PageViewed $event)
    {
        //
        Log::debug(var_dump($event));
    }
}
