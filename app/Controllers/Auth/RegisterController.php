<?php

namespace App\Controllers\Auth;

use App\Controllers\BaseController;
use App\Traits\UserAuthenticateTrait;

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
            $errors['username'] = "Only letters, numbers, userscore and at least 6 characters long allowed!";
        }

        if (!filter_var($params['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format";
        }

        $pattern = '/^(?=.*?[A-Z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$/';
        if (!preg_match($pattern, $params['password'])) {
            $errors['password'] = "Password must contains at least one capitalize letter, number and special charater.";
        }

        if ($params['password'] != $params['confirm_password']) {
            $errors['confirm_password'] = "Password does not match.";
        }

        $exist = $this->checkUsername($params['username']);
        if ($exist) {
            $errors['username'] = "This username is already taken. Please choose another one.";
        } else {
            $usr = [];
            $usr['username'] = $params['username'];
            $usr['password'] = encrypt_password($params['password']);
            $usr['email'] = $params['email'];
            $this->insertUser($usr);
            $isSuccess = true;
            $message['success'] = "Congratulations, your account has been created successfully.";
        }

        if ($isSuccess && empty($errors)) {
            return $this->render('auth/register_success', ['message' => $message]);
        } else return $this->render('auth/register', ['errors' => $errors, 'params' => $params, 'isPost' => $isPost]);
    }
}
