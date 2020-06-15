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

use App\File as ImageFile;

class ProcessImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ImageFile $file)
    {
      // File model
      $this->file = $file;
      // Log::debug('file added '. $this->file->id);
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      // Resize based on original
      $breakpoints = explode(',', env('IMAGE_BREAKPOINTS'));
      $file_path = Storage::disk('local')->path($this->file->file_name);
      switch($this->file->mimetype) {
        case 'image/jpeg':
          $image_file = imagecreatefromjpeg($file_path);
          break;
      }
      // $image = imagescale($image_file, $breakpoints[0]);
      foreach($breakpoints as $breakpoint) {
        Log::debug($breakpoint);
      }
    }
}
