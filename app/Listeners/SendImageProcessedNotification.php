<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

use App\Events\ImageProcessed;
use App\File as ImageFile;

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
     * @param  object  $event
     * @return void
     */
    public function handle(ImageProcessed $event)
    {
      //
      $files_count = ImageFile::where('model_id', '=', $event->image_file->model_id)->count();
      Log::debug("$files_count files created");
    }
}
