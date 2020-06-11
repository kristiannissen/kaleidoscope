<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

use App\File;

class ProcessImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $file;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(File $file)
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
      Log::debug('handle file '. $this->file->id);
    }
}
