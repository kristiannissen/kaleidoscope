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

    public function categories ()
    {
        return $this->belongsToMany('App\Category');
    }

    public function scopePopular ($query)
    {
        return $query->where('id', '>', 3);
    }

    public function scopeRelated ($query, $category_id = 0)
    {
        return $query->where('id', '>', 1);
    }
}
