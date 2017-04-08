<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\AvailableScope;

class Product extends Model
{
    protected $guarded = ['id', 'category_id', 'brand_id'];

    protected $casts = [
        'is_hot'       => 'boolean',
        'is_new'       => 'boolean',
        'is_available' => 'boolean',
        'image'        => 'array',
    ];
    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name',
            ],
        ];
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AvailableScope);
    }

    public function scopeHot($query)
    {
        return $query->where('is_hot', 1);
    }

    public function scopeLatest($query)
    {
        return $query->where('is_new', 1);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class)->withPivot('quantity');;
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

}
