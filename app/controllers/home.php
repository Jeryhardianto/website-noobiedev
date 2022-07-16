<?php 

class home extends Controller {

    public function __construct() {
       if (Session::get('id') != 1 && Session::get('status') != 'logged') {
            Redirect::to('/login');
        }
    }


    public function index()
    {
        $data['title'] = 'Home | '.PROJECT;

        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/index', $data);
        $this->view('backend/templates/footer');
    }
}