<?php

namespace App\Providers;

use App\Providers\ImageProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendImageProcessedNotification
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
     * @param  ImageProcessed  $event
     * @return void
     */
    public function handle(ImageProcessed $event)
    {
        //
    }
}
