<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

use App\Activity;
use App\File;

class BlogPost extends Model
{
    // Create slug based on title
    protected static function booted()
    {
        static::creating(function ($model) {
            $text = preg_replace('~[^\pL\d]+~u', '-', $model->title);
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
            $text = $text = preg_replace('~[^-\w]+~', '', $text);
            $text = trim($text, '-');
            $text = preg_replace('~-+~', '-', $text);

            $model->slug = strtolower($text);

            if ($model->online == 'online') {
                $model->online_at = now();
            }
        });

        static::saved(function ($model) {
            $data = [];
            foreach ($model->getDirty() as $key => $val) {
                $original = $model->getOriginal($key);
                $data[$key] = [
                    'from' => $original,
                    'to' => $val,
                ];
            }
            // Store the activity if any changes where made
            if (count($data) > 0) {
                Activity::create([
                    'user_name' => 'John Do',
                    'user_id' => 1,
                    'model' => 'BlogPost',
                    'model_id' => $model->id,
                    'data' => json_encode($data),
                ]);
            }
        });
    }
    // Set relationship to User
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // Latest
    public function scopeLatest($query)
    {
        return $query->where('online', '=', 'online');
    }
    // Hero Image
    public function heroImage()
    {
        $hero_image = File::where(
            [['model_id', '=', $this->id]],
            ['model_name', '=', 'BlogPost']
        )
            ->orderBy('created_at', 'asc')
            ->first();
        $breakpoints = explode(',', env('IMAGE_BREAKPOINTS'));

        $props = array(
          'original' => Storage::url($hero_image->file_name),
        );
        foreach($breakpoints as $breakpoint) {
          $cached_file = Cache::get('image_'. $this->id .'_'. $breakpoint);
          // _375-250.jpeg
          $matches = array();
          preg_match("/(\d+)-(\d+)/", $cached_file, $matches);
          $props['breakpoint_'. $breakpoint] = (object) array(
            'width' => $matches[1],
            'height' => $matches[2],
            'image' => "storage/". strstr($cached_file, "theme_image")
          );
        }
        return (object) $props;
    }
    // Slides
    public function slides()
    {
        return File::where([
            ['model_id', '=', $this->id],
            ['model_name', '=', 'BlogPost'],
        ])
            ->orderBy('priority')
            ->get();
    }
}
