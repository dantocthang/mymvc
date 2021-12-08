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

class AdminController extends BaseController{

    public function admin(){
        
        $user = auth();
        if ($user == null)
            redirect('/login');
        
        // $isAdmin = Role_user::Where(['role_id' => 1, 'user_id' => $user->id])->first();
        if($_SESSION['isAdmin'])
            return $this->render('admin/admin',[]); 
        else
            redirect('/home'); 
    }

    public function categories(){
        $categories = Category::paginate($this->getPerPage());
        $total = Category::count();

        $paginator = new Paginator($this->request, $categories, $total, 15);

        $paginator->onEachSide(2);

        if ($this->request->ajax()) {
            $html = $this->view->render(
                'admin/categories',
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
}