<?php

namespace App\Controllers;

use League\Plates\Engine;
use App\Http\Request;
use App\Http\Response;
use App\Traits\PaginatorTrait;
use Illuminate\Pagination\Paginator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;

class BaseController
{
    use PaginatorTrait;
    /**
     * URL mặc định để chuyển hướng khi không hợp lệ
     * @var string
     */
    public $redirect = '/home';

    /**
     * View Engine
     * 
     * @var \League\Plates\Engine
     */
    public $view;


    /**
     * Http Request
     * 
     * @var \App\Http\Request
     */
    public $request;

    /**
     * Return response
     * 
     * @var \App\Http\Response
     *
     */
    public $response;


    /**
     * Session
     * 
     * @var \App\Http\Session\Session
     *
     */
    public $session;


    public function __construct()
    {
        $this->init();

        if (!$this->authorize()) {
            redirect($this->redirect);
        }
    }

    /**
     * Phương thức kiểm tra mỗi khi controller được gọi
     * 
     * @return void
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Hàm khởi tạo Controller
     * 
     * @return void
     */
    public function init()
    {
        //$this->view=new Engine(config('view.path'));
        $this->request = request();
        $this->session = session();
        $this->request->setSession($this->session);
        $this->response = new Response();
        $this->view = new Engine(config('view.path'));

        Paginator::currentPageResolver(function ($pageName='page') {
            return $this->getCurrentPage();
        });
    }

    // public function render($view, $data=[]){
    // echo $this->view->render($view,$data);
    // }
    /**
     * Render view
     * 
     * @param string $view
     * @param array $data
     * @return string|mixed
     */
    public function render($view, $data = [])
    {
        $this->response->headers->set('Content-Type', 'text/html');
        $this->response->setStatusCode(Response::HTTP_OK);
        $html = $this->view->render($view, $data);
        $this->response->setContent($html);
        $this->response->prepare($this->request);

        return $this->response->send();
    }


    /**
     * Chuyển hướng đến trang khác
     * 
     * @param string $route
     * @param integer $statusCode
     * @param array $headers
     * @return void 
     */
    public function redirect($route,$statusCode=302,$headers=[]){
        $response=new RedirectResponse($route,$statusCode,$headers);

        return $response->send();
    }

    /**
     * Trả về dữ liệu JSON trong trường hợp Ajax Request
     * 
     * @param array #data
     * @param integer $status
     * @param array $deaders
     * @return void
     */
    public function json($data=[],$status=200,$headers=[])
    {
        $response=new JsonResponse($data,$status,$headers);
        return $response->send();
    }
}
