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
        $breakpoints = explode(',', env('IMAGE_BREAKPOINTS'));
        $file_path = Storage::path($this->file->file_name);

        foreach ($breakpoints as $breakpoint) {
            $image_file = Image::make($file_path);
            $image_file->resize($breakpoint, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            list($file_name_orig, $file_extension) = explode(
                '.',
                basename($file_path)
            );

            $file_name_new =
                dirname($file_path) .
                "/" .
                $file_name_orig .
                "_" .
                $breakpoint .
                "_" .
                $image_file->height() .
                "." .
                $file_extension;

            $image_file->save($file_name_new);

            $cache_key = "image_" . $this->file->model_id . "_" . $breakpoint;

            Cache::forget($cache_key);
            Cache::put(
                $cache_key,
                Storage::url(
                    "theme_images/" .
                        $file_name_orig .
                        "-" .
                        $image_file->height() .
                        "." .
                        $file_extension
                )
            );
        }
    }
}
