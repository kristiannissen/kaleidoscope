<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
