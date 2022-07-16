<?php

class logout extends Controller
{
    public function index()
    {
       unset($_SESSION['id']);
       unset($_SESSION['username']);
       unset($_SESSION['status']);

       Flasher::setFlash('Berhasil','logout', 'danger');
       Redirect::to('/login');
    }

}