<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Cart extends Model
{

    /**
     * Tên bảng, nếu ko có thuộc tính này
     * Eloquent lấy tên theo tên của Model ở dạng số nhiều
     * 
     * @var string
     */
    protected $table = 'carts';
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
        'user_id'     
    ];

    /**
     * cart-detail
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cartDetails()
    {
        return $this->hasMany(CartDetail::class, 'cart_id');
    }


    /**
     * user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    
}
