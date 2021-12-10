<?php

namespace App\Controllers\Product;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Http\Response;
use App\Models\Category;
use App\Http\Paginator;


class ProductController extends BaseController
{

    public function showGrid()
    {
        $category_name = $_GET['category_name'] ?? null;
        if (!$category_name){
            $products = Product::paginate($this->getPerPage());
            $total = Product::count();
        }
        else {
            $category = Category::where(['name' => $category_name])->first();
            $products = Product::where(['category_id' => $category->id])->paginate($this->getPerPage());
            $total = Product::where(['category_id' => $category->id])->count();
        }

        $categories = Category::all();

        $paginator = new Paginator($this->request, $products, $total);
        $paginator->onEachSide(2);

        if ($this->request->ajax()) {
            $html = $this->view->render('product/grid', ['products' => $products, 'paginator' => $paginator, 'categories' => $categories]);
            return $this->json([
                'data' => $html
            ]);
        }
        return $this->render('product/product', ['products' => $products,'paginator' => $paginator, 'categories' => $categories]);
    }


    // public function delete()
    // {
    //     $id = $this->request->post('id');
    //     $product = Product::find($id);
    //     dump($product);

    //     if ($this->request->ajax()) {
    //         if ($product) {
    //             if ($product->delete()) {
    //                 return $this->json([
    //                     'message' => $product->name . 'has been deleted successfully!'
    //                 ], Response::HTTP_OK);
    //             } else {
    //                 return $this->json([
    //                     'message' => 'Unable to delete Product!'
    //                 ], Response::HTTP_BAD_REQUEST);
    //             }
    //         }
    //         return $this->json([
    //             'message' => 'Product ID does not exists!'
    //         ], Response::HTTP_NOT_FOUND);
    //     }

    //     $return_url = $this->request->post('return_url', '/home');
    //     return $this->redirect($return_url);
    // }

    public function detail()
    {

        return $this->render('product/detail');
    }

    public function showDetail()
    {
        $id = $this->request->get('id');
        $detail = Product::find($id);
        return $this->render('/product/detail', ['detail' => $detail]);
    }

    public function search(){
        $keyword = $this->request->post('searchKeyWord');
        $products = Product::where('name', 'like', '%' . $keyword . '%')->paginate($this->getPerPage());
        $total = Product::where('name', 'like', '%' . $keyword . '%')->count();

        $categories = Category::all();

        $paginator = new Paginator($this->request, $products, $total);
        $paginator->onEachSide(2);

        if ($this->request->ajax()) {
            $html = $this->view->render('product/grid', ['products' => $products, 'paginator' => $paginator, 'categories' => $categories]);
            return $this->json([
                'data' => $html
            ]);
        }
        return $this->render('product/product', ['products' => $products,'paginator' => $paginator, 'categories' => $categories]);

    }
}
