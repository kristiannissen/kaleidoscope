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

use Image;

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

        list($file_name, $file_extension) = explode('.', $file_path);
        foreach ($breakpoints as $breakpoint) {
            $image_file = Image::make($file_path);
            $image_file->resize($breakpoint, null);

            $file_resized =
                $file_name . '_' . $breakpoint . '.' . $file_extension;

            $image_file->save($file_resized);
        }
    }
}
