<?php 
class userprofile extends Controller
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
        $data['userprofile'] = $this->model('User_model')->getUserById(1);

        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/user/index', $data);
        $this->view('backend/templates/footer');
       
    }

    public function editprofie(){
        $data['title'] = 'Edit Profile | '.PROJECT;
        $data['userprofile'] = $this->model('User_model')->getUserById(1);

        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/user/editprofile', $data);
        $this->view('backend/templates/footer');

    }

    public function _proses_edit(){
        if (@$_POST['editprofile']) {
            $id         = $_POST['idprofile'];
            $username   = $_POST['username'];
            $email      = $_POST['email'];
    
            $data = [
                'id'        => $id, 
                'username'  => $username,
                'email'     => $email
            ];

    
            $userProfile = $this->model('User_model')->editUser($data);
            var_dump($userProfile);

            if ($userProfile) {
                FlasherAlert::setFlashA('Data berhasil diubah','' ,'success');
                Redirect::to('/userprofile');
            }
        }
    }


    public function resetpass(){
        $data['title'] = 'Reset Password | '.PROJECT;
        $data['userprofile'] = $this->model('User_model')->getUserById(1);

        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/user/resetpass', $data);
        $this->view('backend/templates/footer');

    }
    public function _proses_resetpass(){
        if(@$_POST['resetpass']){
            $id         = '1';
            $password   = $_POST['pass'];
    
            $data = [
                'id'        => $id, 
                'password'  => password_hash($password, PASSWORD_DEFAULT),
            ];
        
            $userProfile = $this->model('User_model')->resetpass($data);
            
            if ($userProfile) {
                FlasherAlert::setFlashA('Password berhasil diubah','' ,'success');
                Redirect::to('/userprofile');
            }
        }
  

    }
    
}


?>