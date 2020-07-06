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
    protected $image_breakpoints;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ImageFile $image_file)
    {
        // File model
        $this->image_file = $image_file;
        $this->image_breakpoints = explode(',', env('IMAGE_BREAKPOINTS'));
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Handle file resize
        $file_path = storage_path(
            env('IMAGE_FOLDER') .
                DIRECTORY_SEPARATOR .
                $this->image_file->file_name
        );
        list($file_name, $file_extension) = explode(
            '.',
            $this->image_file->file_name
        );
        Log::debug('file path ' . $file_name);
        $image = Image::make($file_path);
        foreach ($this->image_breakpoints as $breakpoint) {
            Log::debug('image size ' . $breakpoint);
            $image->resize($breakpoint, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $image->save(
                storage_path(
                    env('IMAGE_FOLDER') .
                        DIRECTORY_SEPARATOR .
                        $file_name .
                        '-' .
                        $breakpoint,
                    100,
                    $file_extension
                )
            );
        }
        event(new ImageProcessed($this->image_file));
    }
}
