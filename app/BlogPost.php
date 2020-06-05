<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

use App\Activity;

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

      // Log activity
      $data = array();
      foreach($model->getDirty() as $key => $val) {
        $original = $model->getOriginal($key);
        $data[$key] = array(
          'from' => $original,
          'to' => $val
        );
      }
      Activity::create(array(
        'model' => 'BlogPost',
        'user_name' => 'John Do',
        'user_id' => 1,
        'data' => json_encode($data)
      ));
    });

    static::updating(function($model) {
      $data = array();
      foreach($model->getDirty() as $key => $val) {
        $original = $model->getOriginal($key);
        $data[$key] = array(
          'from' => $original,
          'to' => $val
        );
      }
      Activity::create(array(
        'user_name' => 'John Do',
        'user_id' => 1,
        'model' => 'BlogPost',
        'data' => json_encode($data)
      ));
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
