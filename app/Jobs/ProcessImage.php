<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Cache;

use Image;

use App\Events\ImageProcessed;
use App\File as ImageFile;

class ProcessImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $image_file;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ImageFile $image_file)
    {
        // File model
        $this->image_file = $image_file;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Handle file resize
        // event(new ImageProcessed($this->image_file));
    }
}
