<?php

class contact extends Controller
{
    public function __construct()
    {
        if (Session::get('id') != 1 && Session::get('status') != 'logged') {
            Redirect::to('/login');
        }
    }


    public function index()
    {
        $data['title'] = 'Contact | '.PROJECT;
        $id = 1;
        $data['contact'] = $this->model('Contact_model')->getContactById($id);

        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/contact', $data);
        $this->view('backend/templates/footer');
    }

    public function contact_edit($id)
    {
        $data['title'] = 'Edit Profile | '.PROJECT;
        $data['contact'] = $this->model('Contact_model')->getContactById($id);


        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/contact_edit', $data);
        $this->view('backend/templates/footer');
    }

    public function _proses_edit_contact()
    {
        if (@$_POST['editContact']) {
            $gambar         = $_FILES['gambarcontact']['name'];
            if ($gambar) {
                //Cek Extensi File
                $file_ext      = strtolower(end(explode('.', $gambar)));
                $extensions     = array("jpeg","jpg","png");

                if (in_array($file_ext, $extensions)=== false) {
                    FlasherAlert::setFlashA('Ekstensi tidak diizinkan, pilih file dengan JPEG,JPG,PNG', '', 'error');
                    Redirect::to('/contact/contact_edit/'.$_POST['idcontact']);
                    exit;
                }

                //Cek ukuran file
                if ($_FILES['gambarcontact']['size'] > 1000000) {
                    FlasherAlert::setFlashA('Ukuran gambar minimal 1 MB', '', 'error');
                    Redirect::to('/contact/contact_edit/'.$_POST['idcontact']);
                    exit;
                }
                $dirLok     = BASELOKSAVE.'/public/assets/upload/';
                $path       = $_FILES['gambarcontact']['tmp_name'];
                $newName    = RandomString::random('30', 'CT-');
                rename($path, $dirLok.$newName);
                $data = [
                            'idcontact'    => $_POST['idcontact'],
                            'alamat'      => htmlspecialchars($_POST['alamat']),
                            'email'      => htmlspecialchars($_POST['email']),
                            'telp'      => htmlspecialchars($_POST['telp']),
                            'maps'      => htmlspecialchars($_POST['maps']),
                            'gambar'       => $newName
                ];
                $contact = $this->model('Contact_model')->UpdateContact($data);

                if ($contact) {
                    $deleteGambar = $dirLok.$_POST['gambarcontactPrev'];
                    unlink($deleteGambar);
                    FlasherAlert::setFlashA('Data berhasil diubah', '', 'success');
                    Redirect::to('/contact/contact_edit/'.$_POST['idcontact']);
                    exit;
                } else {
                    FlasherAlert::setFlashA('Data gagal diubah', '', 'error');
                    Redirect::to('/contact/contact_edit/'.$_POST['idcontact']);
                    exit;
                }
            } else {
                $data = [
                            'idcontact'    => $_POST['idcontact'],
                            'alamat'      => htmlspecialchars($_POST['alamat']),
                            'email'      => htmlspecialchars($_POST['email']),
                            'telp'      => htmlspecialchars($_POST['telp']),
                            'maps'      => htmlspecialchars($_POST['maps']),
                            'gambar'       => $_POST['gambarcontactPrev']
                ];
                $contact = $this->model('Contact_model')->UpdateContact($data);


                if ($contact) {
                    FlasherAlert::setFlashA('Data berhasil diubah', '', 'success');
                    Redirect::to('/contact/contact_edit/'.$_POST['idcontact']);
                    exit;
                } else {
                    FlasherAlert::setFlashA('Data gagal diubah', '', 'error');
                    Redirect::to('/contact/contact_edit/'.$_POST['idcontact']);
                    exit;
                }
            }
        }
    }
}