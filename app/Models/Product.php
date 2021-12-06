<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{

    /**
     * Tên bảng, nếu ko có thuộc tính này
     * Eloquent lấy tên theo tên của Model ở dạng số nhiều
     * 
     * @var string
     */
    protected $table = 'products';
    /**
     * Sử dụng các thuộc tính created_at và updated_at trong bảng
     * 
     * @var boolean
     */
    public $timestamps = false;

    /**
     * Danh các thuộc tính để khi gọi $model->fill($array) thì các
     * giá tị trong mảng sẽ gán cho chúng
     * 
     * @var array
     */
    protected $fillable = [
        'product_name',
        'price',
        'stock'
    ];

    /**
     * profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }


    
}
