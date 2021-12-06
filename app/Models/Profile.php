<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use SoftDeletes;

    protected $table = 'profiles';

    public $timestamps = true;
    //protected  $primaryKey = 'user_id';

    protected $fillable = [
        'location',
        'bio',
        'twitter_username',
        'github_username',
        'avatar',
        'avatar_status'
    ];

    /**
     * user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}