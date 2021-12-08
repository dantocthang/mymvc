<?php

namespace App\Controllers\Product;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Http\Response;

class ProductController extends BaseController
{

    public function showGrid()
    {
        $products = Product::all();
        if ($this->request->ajax()) {
            $html = $this->view->render('product/grid', ['products' => $products]);
            return $this->json([
                'data' => $html
            ]);
        }
        return $this->render('product/product', ['products' => $products]);
    }


    public function delete()
    {
        $id = $this->request->post('id');
        $product = Product::find($id);
        dump($product);

        if ($this->request->ajax()) {
            if ($product) {
                if ($product->delete()) {
                    return $this->json([
                        'message' => $product->name . 'has been deleted successfully!'
                    ], Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message' => 'Unable to delete Product!'
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
            return $this->json([
                'message' => 'Product ID does not exists!'
            ], Response::HTTP_NOT_FOUND);
        }

        $return_url = $this->request->post('return_url', '/home');
        return $this->redirect($return_url);
    }

    public function detail()
    {
        
        return $this->render('product/detail');
    }

    public function showDetail()
    {
        $id=$this->request->get('id');
        $detail=Product::find($id);
        return $this->render('/product/detail',['detail'=>$detail]);
    }
}
