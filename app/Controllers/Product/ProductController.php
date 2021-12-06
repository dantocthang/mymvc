<?php

namespace App\Controllers\Product;

use App\Controllers\BaseController;
use App\Models\Product;

class ProductController extends BaseController
{ 

    public function showGrid()
    {
        $products=Product::all();
        return $this->render('product/grid',['products'=>$products]);
    }

    

    
}
