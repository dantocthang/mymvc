<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class User extends Model
{

    /**
     * Tên bảng, nếu ko có thuộc tính này
     * Eloquent lấy tên theo tên của Model ở dạng số nhiều
     * 
     * @var string
     */
    protected $table = 'categories';
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
        'category_name'
    ];

    /**
     * brand
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }


    
}
