<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;

    /**
     * Tên bảng, nếu ko có thuộc tính này
     * Eloquent lấy tên theo tên của Model ở dạng số nhiều
     * 
     * @var string
     */
    protected $table = 'users';
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
        'username',
        'email',
        'password'
    ];

    /**
     * profile
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function profiles()
    {
        return $this->hasMany(Profile::class, 'user_id');
    }


    /**
     * contacts
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function contacts(){
        return $this->hasMany(Contact::class,'user_id');
    }
}
