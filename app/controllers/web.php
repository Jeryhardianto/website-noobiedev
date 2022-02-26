<?php

class web extends Controller
{

    public function index()
    {
        $data['title'] = 'NOOBIEDEV';
        $this->view('frontend/templates/header', $data);
        $this->view('frontend/index', $data);
        $this->view('frontend/templates/footer');
    }

}