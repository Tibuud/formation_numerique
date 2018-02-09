<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function getDateStartFrAttribute()
    {
        $date_start = Carbon::parse($this->date_start);
        return $date_start->format('d-m-Y');
    }

    public function getDateEndFrAttribute()
    {
        $date_End = Carbon::parse($this->date_End);
        return $date_End->format('d-m-Y');
    }
}
