<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'title', 'post_type', 'description', 'price', 'category_id', 'student_max',"date_start","date_end", 'status'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function picture()
    {
        return $this->hasOne(Picture::class);
    }

    public function setCategoryIdAttribute($value)
    {
        if ($value == 0) {
            $this->attributes['category_id'] = null;
        } else {
            $this->attributes['category_id'] = $value;
        }
    }
}
