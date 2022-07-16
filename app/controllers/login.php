<?php

class login extends Controller
{
    public function index()
    {
        $data['title'] = 'Login | '.PROJECT;


        $this->view('backend/auth/login', $data);
    }

    public function proses_login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = $this->model('User_model')->cekUser($username);
        if ($user){
            if (password_verify($password, $user[0]['password'])){

                Session::set('id',  $user[0]['id']);
                Session::set('username',  $user[0]['username']);
                Session::set('status',  'logged');

                // if (Session::get('id') == 1 && Session::get('status') == 'logged'){
                if (Session::get('status') == 'logged'){
                    header('Location: '.BASEURL.'/home');
                }else{
                    die('betul sih tapi gara2 idnya sama dengan 1');
                    header('Location: '.BASEURL.'/login');
                }

            }else{
                Flasher::setFlash('Username atau Password','salah', 'danger');
                Redirect::to('/login');
                exit;
            }
        }else{
            Flasher::setFlash('Username atau Password','salah', 'danger');
            Redirect::to('/login');
            exit;
        }






    }

    // password_hash(Input::get('pass1'), PASSWORD_DEFAULT)

    public function generatePassRand($pass)
    {
        echo" <b>" .password_hash($pass, PASSWORD_DEFAULT)."</b>"."<br>";
        echo "Paste password ini di field password di tabel user di database";

    }



}

