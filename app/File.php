<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $fillable = [
        'file_name',
        'mimetype',
        'role',
        'model_name',
        'model_id',
        'priority',
        'file_size',
    ];

    protected static function booted()
    {
        // Save the activity
        static::saved(function ($model) {
            $data = [];
            foreach ($model->getDirty() as $key => $val) {
                $original = $model->getOriginal($key);
                $data[$key] = [
                    'from' => $original,
                    'to' => $val,
                ];
            }
            // Store the activity
            Activity::create([
                'user_name' => 'John Do',
                'user_id' => 1,
                'model' => 'File',
                'model_id' => $model->id,
                'data' => json_encode($data),
            ]);
        });
    }
}
