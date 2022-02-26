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



    }



}

