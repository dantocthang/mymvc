<?php

namespace App\Controllers\Product;

use App\Controllers\BaseController;


class ProductController extends BaseController
{

    public function showGrid()
    {
        return $this->render('product/grid');
    }

    

    
}
