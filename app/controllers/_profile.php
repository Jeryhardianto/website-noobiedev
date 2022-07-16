<?php

class _profile extends Controller
{
    public function index()
    {
        $data['profile'] = $this->model('Profile_model')->getProfileById(1);

        $this->view('frontend/templates/header');
        $this->view('frontend/profile', $data);
        $this->view('frontend/templates/footer');
    }
}
