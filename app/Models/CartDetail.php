<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class CartDetail extends Model
{

    /**
     * Tên bảng, nếu ko có thuộc tính này
     * Eloquent lấy tên theo tên của Model ở dạng số nhiều
     * 
     * @var string
     */
    protected $table = 'cart_detail';
    /**
     * Sử dụng các thuộc tính created_at và updated_at trong bảng
     * 
     * @var boolean
     */
    public $timestamps = true;

    /**
     * Danh các thuộc tính để khi gọi $model->fill($array) thì các
     * giá tị trong mảng sẽ gán cho chúng
     * 
     * @var array
     */
    protected $fillable = [
        'amount',
        'price'     
    ];

    /**
     * cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cart()
    {
        return $this->belongsTo(Cart::class, 'cart_id');
    }


    /**
     * product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }


    
}
