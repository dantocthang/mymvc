<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Traits\UserAuthenticateTrait;

class LoginController extends BaseController
{
    use UserAuthenticateTrait;

    public function showLoginForm()
    {
        if (check_login()) {
            //redirect("/home");
            $this->redirect('/home');
        }

        $error = [];
        return $this->render('auth/login');
    }

    public function login()
    {
        $credentials = $this->getCredentials();
        $user = $this->authenticate($credentials);
        if ($user) {
            $user->password = null;
            $_SESSION['user'] = serialize($user);
            //session()->set('user',serialize($user));

            if (isset($_POST['remember_me'])) {
                // Chuyển mảng sang chuổi để mã hóa
                $str = serialize($credentials);

                $encrypted = encrypt($str, ENCRYPTION_KEY);

                setcookie('credentials', $encrypted, mktime(23, 59, 59, 12, 30, 2021));
            }
            session()->setFlash(\FLASH::SUCCESS,'Login successfully!');
            $this->redirect('/home');
        }
        $errors[] = 'Username or password is invalid!';

        return $this->render('auth/login', ['errors' => $errors]);
    }

    public function getCredentials()
    {
        return [
            'username' => $_POST['username'] ?? null,
            'password' => $_POST['password'] ?? null
        ];
    }

    public function logout()
    {
        $this->signout();

        //redirect('/home');
        session()->setFlash(\FLASH::INFO, 'Bye');
        $this->redirect('/home');
    }


    
}
