<?php

class profile extends Controller
{
    public function __construct()
    {
        if (Session::get('id') != 1 && Session::get('status') != 'logged') {
            Redirect::to('/login');
        }
    }


    public function index()
    {
        $data['title'] = 'Profile | '.PROJECT;
        $id = 1;
        $data['profile'] = $this->model('Profile_model')->getProfileById($id);

        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/profile', $data);
        $this->view('backend/templates/footer');
    }

    public function profile_edit($id)
    {
        $data['title'] = 'Edit Profile | '.PROJECT;
        $data['profile'] = $this->model('Profile_model')->getProfileById($id);

        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/profile_edit', $data);
        $this->view('backend/templates/footer');
    }

    public function _proses_edit_profile()
    {
        if (@$_POST['editProject']) {
            $gambar         = $_FILES['gambarProfile']['name'];
            if ($gambar) {
                //Cek Extensi File
                $file_ext      = strtolower(end(explode('.', $gambar)));
                $extensions     = array("jpeg","jpg","png");

                if (in_array($file_ext, $extensions)=== false) {
                    FlasherAlert::setFlashA('Ekstensi tidak diizinkan, pilih file dengan JPEG,JPG,PNG', '', 'error');
                    Redirect::to('/profile/profile_edit/'.$_POST['idprofile']);
                    exit;
                }

                //Cek ukuran file
                if ($_FILES['gambarProfile']['size'] > 1000000) {
                    FlasherAlert::setFlashA('Ukuran gambar minimal 1 MB', '', 'error');
                    Redirect::to('/profile/profile_edit/'.$_POST['idprofile']);
                    exit;
                }
                $dirLok     = BASELOKSAVE.'/public/assets/upload/';
                $path       = $_FILES['gambarProfile']['tmp_name'];
                $newName    = RandomString::random('30', 'PR-');
                rename($path, $dirLok.$newName);
                $data = [
                            'idprofile'    => $_POST['idprofile'],
                            'profile'      => htmlspecialchars($_POST['profile']),
                            'gambar'       => $newName
                ];
                $profile = $this->model('Profile_model')->UpdateProfile($data);

                if ($profile) {
                    $deleteGambar = $dirLok.$_POST['gambarProfilePrev'];
                    unlink($deleteGambar);
                    FlasherAlert::setFlashA('Data berhasil diubah', '', 'success');
                    Redirect::to('/profile/profile_edit/'.$_POST['idprofile']);
                    exit;
                } else {
                    FlasherAlert::setFlashA('Data gagal diubah', '', 'error');
                    Redirect::to('/profile/profile_edit/'.$_POST['idprofile']);
                    exit;
                }
            } else {
                $data = [
                            'idprofile'    => $_POST['idprofile'],
                            'profile'      => htmlspecialchars($_POST['profile']),
                            'gambar'       => $_POST['gambarProfilePrev']
                ];
                $profile = $this->model('Profile_model')->UpdateProfile($data);

                if ($profile) {
                    FlasherAlert::setFlashA('Data berhasil diubah', '', 'success');
                    Redirect::to('/profile/profile_edit/'.$_POST['idprofile']);
                    exit;
                } else {
                    FlasherAlert::setFlashA('Data gagal diubah', '', 'error');
                    Redirect::to('/profile/profile_edit/'.$_POST['idprofile']);
                    exit;
                }
            }
        }
    }
}