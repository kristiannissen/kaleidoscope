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
}
