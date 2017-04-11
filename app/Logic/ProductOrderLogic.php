<?php
namespace App\Logic;
use App\Models\Product;

class ProductOrderLogic{
	public $product;

	public function __construct(Product $product)
	{
		$this->product = $product;
	}

	public function canDelete()
	{
		if($this->product->orders->count() == 0)
		{
			return true;
		}
		return false;
	}
}
