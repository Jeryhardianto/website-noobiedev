<?php

class _project extends Controller
{
    public function index()
    {
        $data['project'] = $this->model('Project_model')->getAllProject(1);

        $this->view('frontend/templates/header');
        $this->view('frontend/project', $data);
        $this->view('frontend/templates/footer');
    }

    public function _detail_project($id)
    {
        $data['project'] = $this->model('Project_model')->getProjectById($id);
        $data['detail_project'] = $this->model('Project_model')->getDetailProjectByIdX($id);
        $data['video'] = $this->model('Project_model')->getVideoByIdX($id);

        $this->view('frontend/templates/header');
        $this->view('frontend/detail_project', $data);
        $this->view('frontend/templates/footer');

    }
}
