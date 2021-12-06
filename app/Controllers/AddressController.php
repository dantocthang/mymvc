<?php

namespace App\Controllers;

use App\Http\Paginator;
use App\Http\Response;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;

class AddressController extends BaseController{

    public function ward(){
        $items=Ward::paginate($this->getPerPage());
        $total=Ward::count();
        
        $paginator=new Paginator($this->request,$items,$total);

        // Thêm các tham số vào url trong link phân trang
        $paginator->appends('city_id','2');

        // Thêm mảng các tham số: 
        // $paginator->appendArray([
        //     'param1' => 1,
        //     'param2' => 2
        // ]);
        $paginator->onEachSide(2);
        
        if ($this->request->ajax()){
            // Render trực tiếp bằng View engine $this->view->render()
            $html=$this->view->render('address/ward-list',['items'=>$items, 'paginator'=>$paginator]);
            return $this->json([
                'data'=>$html
            ]);
            dump($html);
        }
        
        return $this->render('address/ward',['items'=>$items, 'paginator'=>$paginator]); 
        
    }

    public function deleteWard()
    {
        $id=$this->request->post('id');
        $ward=Ward::find($id);
        
        // Nếu ajax request trả về json
        if ($this->request->ajax()){
            if ($ward){
                if ($ward->delete()){
                    return $this->json([
                        'message'=>$ward->name . 'has been deleted successfully!'
                    ],Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message'=>'Unable to delete Ward!'
                    ],Response::HTTP_BAD_REQUEST);
                }
            }
            return $this->json([
                'message'=>'Ward ID does not exists!'
            ], Response::HTTP_NOT_FOUND);
        }

        if ($ward){
            if ($ward->delete()){
                session()->setFlash(\FLASH::SUCCESS,$ward->name . 'has been deleted successfully!');
            }
            else {
                session()->setFlash(\FLASH::ERROR,'Unable to delete Ward');
            }
        }
        else {
            session()->setFlash(\FLASH::ERROR,'Ward ID does not exists!');
        }

        $return_url=$this->request->post('return_url','/home');
        return $this->redirect($return_url);
    }
}