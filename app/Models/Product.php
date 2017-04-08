<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table   = 'products';
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

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'likeable');
    }

    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function stock()
    {
        return $this->hasOne(Stock::class);
    }
    //

    public function category()
    {
        # code...
        return $this->belongsTo('App\Models\Category');

    }

    public function orderProduct()
    {
        # code...
        return $this->belongsToMany('App\Models\OrderProduct', 'product_id');
    }

    public function stoke()
    {
        # code...
        return $this->belongsTo('App\Models\Stoke', 'stoke_id');

    }

}
