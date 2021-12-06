<?php
namespace App\Controllers;
use App\Traits\UserAuthenticateTrait;
class HomeController extends BaseController
{
    use UserAuthenticateTrait;
    public function index(){
        $this->auto_login();
        return $this->render('home/index');
    }   
}