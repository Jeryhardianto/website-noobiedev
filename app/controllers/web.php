<?php

class web extends Controller
{

    public function index()
    {
        $data['title'] = 'NOOBIEDEV';
        $data['projects'] = $this->model('Project_model')->getAllProject();
        // Contact
        $data['contact']  = $this->model('Contact_model')->getContactById(1);
        $data['video'] =  $this->model('Video_model')->getAllVideo();

        
        $this->view('frontend/templates/header', $data);
        $this->view('frontend/index', $data);
        $this->view('frontend/templates/footer');
    }

}