<?php

namespace App\Controllers;

use App\Http\Response;
use App\Http\Request;
use App\Models\Profile;
use App\Models\User;


class ProfileController extends BaseController
{
    public function showProfile()
    {
        $user = auth();
        if ($user == null)
            redirect('/login');
        $profile = Profile::whereuser_id($user->id)->first();
        if ($profile == null) {
            return $this->render('user/edit');
        }

        return $this->render('user/show', ['profile' => $profile]);
    }


    public function showEditProfile()
    {
        $user = auth();
        if ($user == null)
            redirect('/login');
        $profile = Profile::whereuser_id($user->id)->first();
        if ($profile == null) {
            return $this->render('user/edit');
        }

        return $this->render('user/edit', ['profile' => $profile]);
    }

    public function editProfile()
    {

        $ok = 1;
        $user = auth();
        $profile = Profile::whereuser_id($user->id)->first();
        if ($profile == null) {
            $profile = new Profile();
            $profile->user_id = $user->id;
        }

        $attr = [
            "location" => $_POST['location'],
            "bio"  => $_POST['bio'],
            "twitter_username" => $_POST['twitter_username'],
            "github_username" => $_POST['github_username']
        ];

        // Avatar
        if (($_FILES['imageUpload']['name']) != null) {
            $uploaddir = 'assets/img/profile/';
            $uploadfile = $uploaddir . basename($_FILES['imageUpload']['name']);

            $imageFileType = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));
            if (
                $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif"
            ) {
                session()->setFlash(\FLASH::WARNING, 'Lỗi, chỉ định dạng JPG, JPEG, PNG & GIF được cho phép.');
                $ok = 0;
            }


            if (move_uploaded_file($_FILES['imageUpload']['tmp_name'], $uploadfile)) {
            } else {
                session()->setFlash(\FLASH::ERROR, 'Thay đổi ảnh đại diện thất bại');
            }

            $profile->avatar_status = 1;
            $profile->avatar = $_FILES['imageUpload']['name'];
        }

        //Avatar           
        $profile->fill($attr);

        if ($ok == 1) {
            $profile->save();
            session()->setFlash(\FLASH::SUCCESS, 'Thay đổi đã được lưu');
        }

        return $this->render('user/show', ['profile' => $profile]);
    }
}
