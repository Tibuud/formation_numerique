<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Str;

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
        if ($value == 1000) {
            $this->attributes['category_id'] = null;
        } else {
            $this->attributes['category_id'] = $value;
        }
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeResearch($query, $q)
    {
        return $query->where('title', 'like', "%" . $q . "%")
                      ->orwhere('description', 'like', "%" . $q . "%")
                      ->orwhere('post_type', 'like', "%" . $q . "%");
    }

    public function getSlugAttribute($value)
    {
        return Str::slug($this->attributes['title']);
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

    public function getDateStartForInputAttribute()
    {
        return substr($this->date_start, 0, 10) . "T" . substr($this->date_start, 11, 5);
    }

    public function getDateEndForInputAttribute()
    {
        return substr($this->date_end, 0, 10) . "T" . substr($this->date_end, 11, 5);
    }
}
