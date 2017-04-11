<?php
namespace App\Logic;
use App\Models\Category;

class CategoryProductLogic{
	public $category;

	public function __construct(Category $category)
	{
		$this->category = $category;
	}

	public function canDelete()
	{
		if($this->category->products()->count() == 0)
		{
			return true;
		}
		return false;
	}
}
