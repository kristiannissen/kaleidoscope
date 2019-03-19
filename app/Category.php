<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $text = preg_replace('~[^\pL\d]+~u', '-', $model->title);
            $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
            $text = preg_replace('~[^-\w]+~', '', $text);
            $text = trim($text, '-');
            $text = preg_replace('~-+~', '-', $text);

            $model->slug = strtolower($text);
        });
    }

    public function blogEntries ()
    {
        return $this->belongsToMany('App\BlogEntry');
    }
}
