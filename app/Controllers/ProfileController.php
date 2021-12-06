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
            return $this->render('user/add');
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
            return $this->render('user/add');
        }

        return $this->render('user/edit', ['profile' => $profile]);
    }

    public function editProfile()
    {

        $ok = 1;
        $user=auth();
        $profile = Profile::whereuser_id($user->id)->first();
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
                session()->setFlash(\FLASH::WARNING, 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
                $ok = 0;
            }


            if (move_uploaded_file($_FILES['imageUpload']['tmp_name'], $uploadfile)) {
            } else {
                session()->setFlash(\FLASH::ERROR, 'Your avatar upload has failed!');
            }

            $profile->avatar_status = 1;
            $profile->avatar = $_FILES['imageUpload']['name'];
        }
        if (isset($_POST['showhide'])) {
            if ($_POST['showhide'] == "show")
                $profile->avatar_status = 1;
            else $profile->avatar_status = 0;
        }

        //Avatar           
        $profile->fill($attr);

        if ($ok == 1) {
            $profile->save();
            session()->setFlash(\FLASH::SUCCESS, 'Changes saved successfully!');
        }


        return $this->render('user/show', ['profile' => $profile]);
    }
}
