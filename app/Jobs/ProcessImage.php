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
        $breakpoints = explode(',', env('IMAGE_BREAKPOINTS'));
        $file_path = Storage::path($this->image_file->file_name);
        list($file_name, $file_extension) = explode(".", $file_path);

        foreach ($breakpoints as $breakpoint) {
            $image = Image::make($file_path);
            $image->resize($breakpoint, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $image_file_name =
                $file_name . "_" . $breakpoint . "." . $file_extension;

            if (Storage::exists($image_file_name)) {
                Storage::delete($image_file_name);
            }
            $image->save($image_file_name);

            ImageFile::create([
                'file_name' => $image_file_name,
                'role' => $this->image_file->role,
                'model_name' => $this->image_file->model_name,
                'model_id' => $this->image_file->model_id,
                'mimetype' => $this->image_file->mimetype,
                'priority' => $this->image_file->priority + 1,
                'file_size' => $breakpoint . "-" . $image->height(),
            ]);
        }
    }
}
