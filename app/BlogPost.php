<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class BlogPost extends Model
{
  // Create slug based on title
  protected static function booted()
  {
    static::creating(function($model){
      $text = preg_replace('~[^\pL\d]+~u', '-', $model->title);
      $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
      $text = $text = preg_replace('~[^-\w]+~', '', $text);
      $text = trim($text, '-');
      $text = preg_replace('~-+~', '-', $text);

      $model->slug = strtolower($text);

      if ($model->online == 'online')
      {
        $model->online_at = now();
      }
    });

    static::updating(function($model) {
      foreach($model->getDirty() as $key => $val) {
        $original = $model->getOriginal($key);
        Log::debug('blog changes '. $key .'-'. $val .'-'. $original);
      }
    });
  }
  // Set relationship to User
  public function user()
  {
    return $this->belongsTo('App\User');
  }
  // Latest
  public function scopeLatest ($query)
  {
    return $query->where('online', '=', 'online');
  }
}
