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
    protected $table = 'brands';
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
        'brand_name'     
    ];

    /**
     * profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'brand_id');
    }

    public function categories(){
        return $this->hasMany(Category::class, 'brand_id');
    }


    
}
