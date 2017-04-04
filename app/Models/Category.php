<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table    = 'categories';
	protected $fillable = ['id', 'name', 'slug', 'description'];

	public function products()
	{
        return $this->hasMany(Product::class); // 1 cate co the co nhieu product

    }
}
