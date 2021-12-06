<?php

namespace App\Traits;

use App\Models\User;

trait UserAuthenticateTrait
{

    /**
     * Kiểm tra thông tin user
     * So khớp password == password_hash
     * 
     * @param array $credentials
     * @return \App\Models\User|mixed|null
     */
    public function authenticate($credentials)
    {
        $user = User::where(['username' => $credentials['username']])->first();
        if ($user) {
            if (password_check($credentials['password'], $user->password)) {
                return $user;
            }
            return null;
        }
        return null;
    }

    public function signout()
    {
        unset($_SESSION['user']);
        //session()->remove('user');

        if (isset($_COOKIE['credentials'])) {
            setcookie('credentials', null, time() - 3600);
        }
    }

    public function checkUsername($username)
    {
        $user = User::where(['username' => $username])->first();
        if ($user) return true;
        else return false;
    }

    public function insertUser($params){
        $usr=new User;
        $usr->fill($params);
        $usr->save();
    }

    public function auto_login()
    {
        
        $encryptedCredentials = $_COOKIE['credentials'] ?? null;
        if (!$encryptedCredentials) {
            return;
        }

        $decriptedCredentials = decrypt($encryptedCredentials, ENCRYPTION_KEY);

        $credentials = unserialize($decriptedCredentials);
        
        $user = $this->authenticate($credentials);
        if ($user) {
            
            $_SESSION['user'] = serialize($user);
        }
 
    }


    
}
