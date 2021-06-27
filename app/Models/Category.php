<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';

    protected $fillable = ['name', 'parent_id', 'active', 'slug'];

    CONST ACTIVE = 1;
    CONST INACTIVE = 0;

    CONST PARENT = 0;

    public function setSlugAttribute()
    {
        $this->attributes['slug'] = Str::slug($this->attributes['name']);
    }

    public function scopeGetParent($query)
    {
        return $query->where('parent_id', self::PARENT);
    }

    public function scopeActive($query)
    {
        return $query->where('active', self::ACTIVE);
    }

    public function parent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'id');
    }
}
