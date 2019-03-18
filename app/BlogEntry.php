<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogEntry extends Model
{
    //
    protected $table = 'blogentries';

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

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'DESC')
                     ->take(5)
                     ->get();
    }
}
