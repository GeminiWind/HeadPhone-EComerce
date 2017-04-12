<?php

namespace App\Models;

use App\Scopes\AvailableScope;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

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

    public function isSale()
    {
        $current_time = Carbon::now()->toDateString();
        foreach ($this->events()->get() as $sale) {
            if ($sale->began_at < $current_time &&
                $sale->ended_at > $current_time) {
                return $sale;
                break;
            }
        }
        return null;
    }

    public function getCurrentPriceAttribute($value)
    {
        $sale = $this->isSale();
        if ($sale != null) {
            $temp         = ($this->price / 100) * $sale->rate;
            $currentPrice = $this->price - $temp;
            return $currentPrice;
        }
        return $this->price;

    }

    public function setImageAttribute($value)
    {
        $this->attributes['image'] = json_encode($value);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
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
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'price');
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }

}
