<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    const FEATURE = 'feature';
    const DETAIL = 'detail';
    const ACTIVE = 1;

    protected $fillable = ['name', 'slug', 'code', 'price_marketing', 'price_sell', 'star', 'description', 'view', 'category_id', 'status'];

    public function setSlugAttribute()
    {
        $this->attributes['slug'] = Str::slug($this->attributes['name']);
    }

    public function medias()
    {
        return $this->morphMany(Media::class, 'model');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', self::ACTIVE);
    }

    public function mediaFeature()
    {
        return $this->medias()->where('collection', self::FEATURE)->first();
    }

    public function mediaFeatureFromCollection()
    {
        return $this->medias->where('collection', self::FEATURE)->first();
    }

    public function mediaDetailFromCollection()
    {
        return $this->medias->where('collection', self::DETAIL)->all();
    }


    public static function generateCode()
    {
        $code = Str::random(9);
        if (self::where('code', $code)->count() > 0) self::generateCode();
        return $code;
    }
}
