<?php
namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Traits\UserAuthenticateTrait;
class HomeController extends BaseController
{
    use UserAuthenticateTrait;
    public function index(){
        $this->auto_login();
        $smartphone_id=Category::wherename('Smartphone')->first()->id;
        $tablet_id=Category::wherename('Tablet')->first()->id;
        $laptop_id=Category::wherename('Laptop')->first()->id;
        $smartphones=Product::wherecategory_id($smartphone_id)->inRandomOrder()->take(4)->get();
        $tablets=Product::wherecategory_id($tablet_id)->inRandomOrder()->take(4)->get();
        $laptops=Product::wherecategory_id($laptop_id)->inRandomOrder()->take(4)->get();

        $Pcount=Product::count();
        $Bcount=Brand::count();
        $data=[
            'smartphones' =>$smartphones,
            'tablets' =>$tablets,
            'laptops' =>$laptops,
            'count'=>[
                'pcount'=>$Pcount,
                'bcount'=>$Bcount
            ],

        ];
        
        return $this->render('home/index',$data);
    }   
}