<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Traits\UserAuthenticateTrait;

use App\Models\User;
use App\Models\Role_user;

class RegisterController extends BaseController
{
    use UserAuthenticateTrait;

    public function showRegisterForm()
    {
        if (check_login() == true) {
            redirect('/home');
        }
        $error = [];
        $isPost = false;
        return $this->render('auth/register', ['isPost' => $isPost]);
    }

    public function register()
    {
        $isPost = true;
        $isSuccess = false;
        $params = [];
        $errors = [];

        $params['username'] = $_POST['username'] ?? null;
        $params['email'] = $_POST['email'] ?? null;
        $params['password'] = $_POST['password'] ?? null;
        $params['confirm_password'] = $_POST['confirm_password'] ?? null;

        $pattern = '/^[a-zA-Z0-9_]{6,20}$/';
        if (!preg_match($pattern, $params['username'])) {
            $errors['username'] = "Tên đăng nhập chỉ gồm chữ cái, chữ số, dấu gạch dưới (_), và có độ dài ít nhất 6 ký tự";
        }

        if (!filter_var($params['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Sai định dạng email";
        }

        $pattern = '/^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/';
        if (!preg_match($pattern, $params['password'])) {
            $errors['password'] = "Mật khẩu phải chứa ít nhất 1 ký tự in hoa, một con số, 1 ký tự đặc biệt và dài ít nhất 8 ký tự!";
        }

        if ($params['password'] != $params['confirm_password']) {
            $errors['confirm_password'] = "Mật khẩu nhập lại không đúng";
        }

        $exist = $this->checkUsername($params['username']);
        if ($exist) {
            $errors['username'] = "Tên đăng nhập đã tồn tại, vui lòng chọn tên khác!";
        } 
        
        if(empty($errors)){
            $usr = [];
            $usr['username'] = $params['username'];
            $usr['password'] = encrypt_password($params['password']);
            $usr['email'] = $params['email'];
            $this->insertUser($usr);
            $user = User::Where(['username'=> $usr['username']])->first();
            $roleUser = new Role_user();
            $roleUser->user_id = $user->id;
            $roleUser->role_id = 2;
            $roleUser->save(); 
            $isSuccess = true;
            $message['success'] = "Chúc mừng, tài khoản của bạn đã được tạo thành công";
        }

        if ($isSuccess && empty($errors)) {
            return $this->render('auth/register_success', ['message' => $message]);
        } else return $this->render('auth/register', ['errors' => $errors, 'params' => $params, 'isPost' => $isPost]);
    }
}
