<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Http\Response;
use App\Models\Cart;
use App\Models\CartDetail;
use App\Http\Paginator;

class CartController extends BaseController
{
    public function addToCart()
    {
        $user = auth();
        if ($user == null) {

            session()->setFlash(\FLASH::INFO, 'Bạn phải đăng để sử dụng chức năng này');

            redirect('/login');
        }

        $product_id = $this->request->get('id');
        $product = Product::find($product_id);
        $user = auth();
        $cart = Cart::whereuser_id($user->id)->first();
        if ($cart == null) {
            $cart = new Cart();
            $cart->user_id = $user->id;
            $cart->save();
            $cartDetail = new CartDetail();
            $cartDetail->cart_id = $cart->id;
            $cartDetail->product_id = $product->id;
            $cartDetail->amount = 1;
            $cartDetail->price = $product->price;
            $cartDetail->save();
        } else {
            $item = CartDetail::whereproduct_id($product_id)->first();
            if ($item != null) {
                $item->amount++;
                $item->save();
            } else {
                $cartDetail = new CartDetail();
                $cartDetail->cart_id = $cart->id;
                $cartDetail->product_id = $product->id;
                $cartDetail->amount = 1;
                $cartDetail->price = $product->price;
                $cartDetail->save();
            }
        }

        redirect('/cart');
    }

    public function cart()
    {
        $user = auth();
        if ($user == null) {

            session()->setFlash(\FLASH::INFO, 'Bạn phải đăng để sử dụng chức năng này');

            redirect('/login');
        }
        $cart = Cart::whereuser_id($user->id)->first();
        $cartDetails = CartDetail::wherecart_id($cart->id)->paginate($this->getPerPage());
        $items = CartDetail::wherecart_id($cart->id)->get();
        $total_price = 0;
        foreach ($items as $item) {
            $total_price += $item->amount * $item->price;
        }
        $total = CartDetail::wherecart_id($cart->id)->count();
        $paginator = new Paginator($this->request, $cartDetails, $total);
        $paginator->onEachSide(2);

        if ($this->request->ajax()) {
            $html = $this->view->render('cart/cart-list', ['cartDetails' => $cartDetails, 'paginator' => $paginator, 'cart' => $cart, 'total_price' => $total_price]);
            //print_r($html);
            return $this->json([
                'data' => $html
            ]);
        }

        return $this->render('cart/cart', ['cartDetails' => $cartDetails, 'paginator' => $paginator, 'cart' => $cart, 'total_price' => $total_price]);
    }


    public function delete()
    {
        $id = $this->request->post('id');
        $cartDetail = CartDetail::find($id);
        if ($this->request->ajax()) {
            if ($cartDetail) {
                if ($cartDetail->delete()) {
                    return $this->json([
                        'message' => 'Sản phẩm '. $cartDetail->name . ' đã được xóa thành công!'
                    ], Response::HTTP_OK);
                } else {
                    return $this->json([
                        'message' => 'Không thể xóa chi tiết giỏ hàng này'
                    ], Response::HTTP_BAD_REQUEST);
                }
            }
            return $this->json([
                'message' => 'Chi tiết giỏ hàng không tồn tại!'
            ], Response::HTTP_NOT_FOUND);
        }

        $return_url = $this->request->post('return_url', '/home');
        return $this->redirect($return_url);
    }
}
