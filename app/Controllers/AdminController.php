<?php

namespace App\Controllers;

use App\Http\Paginator;
use App\Http\Response;
use App\Models\Role;
use App\Models\Role_user;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;


// use App\Models\City;
// use App\Models\District;
// use App\Models\Ward;

class AdminController extends BaseController
{

    public function admin()
    {

        $user = auth();
        if ($user == null)
            redirect('/login');

        // $isAdmin = Role_user::Where(['role_id' => 1, 'user_id' => $user->id])->first();
        if ($_SESSION['isAdmin'])
            return $this->render('admin/admin', []);
        else
            redirect('/home');
    }

    public function categories()
    {
        unset($_POST);
        $categories = Category::paginate($this->getPerPage());
        $total = Category::count();

        $paginator = new Paginator($this->request, $categories, $total, 15);

        $paginator->onEachSide(2);

        if ($this->request->ajax()) {
            $html = $this->view->render(
                'admin/cat-list',
                [
                    'categories' => $categories,
                    'paginator' => $paginator,
                ]
            );

            return $this->json(['data' => $html]);
        }

        return $this->render(
            'admin/categories',
            [
                'categories' => $categories,
                'paginator' => $paginator,
            ]
        );
    }

    public function addCategory()
    {
        print_r($_POST);
        $isPost = $_POST['submit'] ?? null;
        if ($isPost) {
            $category = new Category();
            $category->name = $_POST['name'];
            $isExist = Category::wherename($category->name)->first();
            if (!$isExist) {
                $category->save();
                session()->setFlash(\FLASH::SUCCESS, 'Category added successfully!');
            } else
                session()->setFlash(\FLASH::WARNING, 'Category name is already existed!');
        }
        return $this->categories();
    }

    public function deleteCategory()
    {
        $id = $this->request->post('id');
        $category = Category::find($id);
        dump($category);

        if ($this->request->ajax()) {
            if ($category) {
                if ($category->delete()) {
                    return $this->json([
                        'message' => $category->name . 'has been deleted successfully!'
                    ], Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message' => 'Unable to delete category!'
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
            return $this->json([
                'message' => 'Category ID does not exists!'
            ], Response::HTTP_NOT_FOUND);
        }

        $return_url = $this->request->post('return_url', '/home');
        return $this->redirect($return_url);
    }

    public function brands()
    {

        $brands = Brand::paginate($this->getPerPage());
        $total = Brand::count();

        $paginator = new Paginator($this->request, $brands, $total, 15);

        $paginator->onEachSide(2);

        if ($this->request->ajax()) {
            $html = $this->view->render(
                'admin/brand-list',
                [
                    'brands' => $brands,
                    'paginator' => $paginator,
                ]
            );

            return $this->json(['data' => $html]);
        }

        return $this->render(
            'admin/brands',
            [
                'brands' => $brands,
                'paginator' => $paginator,
            ]
        );
    }

    public function addBrand()
    {
        $isPost = $_POST['submit'] ?? null;
        if ($isPost) {
            $brand = new Brand();
            $brand->name = $_POST['name'];
            $isExist = Brand::wherename($brand->name)->first();
            if (!$isExist) {
                $brand->save();
                session()->setFlash(\FLASH::SUCCESS, 'Brand added successfully!');
                unset($_POST['name']);
            } else
                session()->setFlash(\FLASH::WARNING, 'Brand name is already existed!');
        }
        unset($_POST['submit']);
        return $this->brands();
    }

    public function deletebrand()
    {
        $id = $this->request->post('id');
        $brand = Brand::find($id);

        if ($this->request->ajax()) {
            if ($brand) {
                if ($brand->delete()) {
                    return $this->json([
                        'message' => $brand->name . 'has been deleted successfully!'
                    ], Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message' => 'Unable to delete brand!'
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
            return $this->json([
                'message' => 'Brand ID does not exists!'
            ], Response::HTTP_NOT_FOUND);
        }

        $return_url = $this->request->post('return_url', '/home');
        return $this->redirect($return_url);
    }


    public function products()
    {
        if (isset($_GET['product-id'])) {
            $product = Product::find($_GET['product-id']);
            $categories = Category::all();
            $brands = Brand::all();
            return $this->render(
                'admin/product-add',
                [
                    'product'=> $product,
                    'brands' => $brands,
                    'categories' => $categories,
                ]
            );
        }

        $products = Product::paginate($this->getPerPage());
        $total = Product::count();

        $paginator = new Paginator($this->request, $products, $total, 15);

        $paginator->onEachSide(2);

        if ($this->request->ajax()) {
            $html = $this->view->render(
                'admin/product-list',
                [
                    'products' => $products,
                    'paginator' => $paginator,
                ]
            );

            return $this->json(['data' => $html]);
        }

        return $this->render(
            'admin/products',
            [
                'products' => $products,
                'paginator' => $paginator,
            ]
        );
    }

    public function showAddProduct()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return $this->render(
            'admin/product-add',
            [
                'brands' => $brands,
                'categories' => $categories,
            ]
        );
    }

    public function addProduct()
    {
        $ok = 1;
        $attr = [
            "category_id" => $_POST['category'],
            "brand_id" => $_POST['brand'],
            "name" => $_POST['name'],
            "price"  => $_POST['price'],
            "description" => $_POST['description'],
        ];

        // Avatar
        if (($_FILES['image']['name']) != null) {
            $uploaddir = 'assets/img/product/';
            $uploadfile = $uploaddir . basename($_FILES['image']['name']);

            $imageFileType = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                session()->setFlash(\FLASH::WARNING, 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
                $ok = 0;
            }


            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            } else {
                session()->setFlash(\FLASH::ERROR, 'Your hình ảnh sản phẩm upload has failed!');
            }
            if ($ok) {
                $product = new Product();
                $product->image = $_FILES['image']['name'];
                $product->fill($attr);
                $product->save();
                session()->setFlash(\FLASH::SUCCESS, 'Changes saved successfully!');
            } else
                session()->setFlash(\FLASH::ERROR, 'Không thêm được sản phẩm');
        }
        return $this->products();
    }

    public function editProduct()
    {
        $product_id = $_POST['product-id'];  
        $product = Product::find($product_id);
        $ok = 1;
        $attr = [
            "category_id" => $_POST['category'],
            "brand_id" => $_POST['brand'],
            "name" => $_POST['name'],
            "price"  => $_POST['price'],
            "description" => $_POST['description'],
        ];

        // Avatar
        if (($_FILES['image']['name']) != null) {
            $uploaddir = 'assets/img/product/';
            $uploadfile = $uploaddir . basename($_FILES['image']['name']);

            $imageFileType = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                session()->setFlash(\FLASH::WARNING, 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
                $ok = 0;
            }


            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            } else {
                session()->setFlash(\FLASH::ERROR, 'Your hình ảnh sản phẩm upload has failed!');
            }
            if ($ok) {
                $product->image = $_FILES['image']['name'];
                
            } else
                session()->setFlash(\FLASH::ERROR, 'Không thêm hình ảnh');
        }

        $product->fill($attr);
        $product->save();
        session()->setFlash(\FLASH::SUCCESS, 'Changes saved successfully!');

        return $this->products();
    }

    public function deleteProduct()
    {
        $id = $this->request->post('id');
        $product = Product::find($id);
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
}
