<?php
class video extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title']      = 'Video | '.PROJECT;
        $data['video'] =  $this->model('Video_model')->getAllVideo();
        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/video', $data);
        $this->view('backend/templates/footer');
    }

    public function _proses_tambah_video()
    {
        if (@$_POST['AddVideo']) {
            $data = [
                 'lokasi'  => htmlspecialchars($_POST['lokasi']),
                 'url'         => htmlspecialchars($_POST['url']),
                 'date_created' => date('Y-m-d H:i:s')
              ];

            $video = $this->model('Video_model')->tambahVideo($data);

            if ($video) {
                FlasherAlert::setFlashA('Data berhasil ditambahkan', '', 'success');
                Redirect::to('/video');
                exit;
            } else {
                FlasherAlert::setFlashA('Data gagal ditambahkan', '', 'error');
                Redirect::to('/video');
                exit;
            }
        }
    }

    public function edit_video($id)
    {
        $data['title']      = 'Edit Video | '.PROJECT;
        $data['idvideo']    = $id;
        $data['video']      = $this->model('Video_model')->getVideoById($id);

        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/edit-video-page', $data);

        $this->view('backend/templates/footer');
    }

    public function _proses_edit_video()
    {
        if (@$_POST['editVideo']) {
            $data = [
                 'id'  => htmlspecialchars($_POST['id']),
                 'lokasi'  => htmlspecialchars($_POST['lokasi']),
                 'url'         => htmlspecialchars($_POST['url']),
                 'date_updated' => date('Y-m-d H:i:s')
              ];
                $video = $this->model('Video_model')->editVideo($data);
                  
                if ($video) {
                    FlasherAlert::setFlashA('Data berhasil diubah', '', 'success');
                    Redirect::to('/video');
                    exit;
                } else {
                    FlasherAlert::setFlashA('Data gagal diubah', '', 'error');
                    Redirect::to('/video');
                    exit;
                }
     
        }
    }

    public function delete_edit_video($id){
            $video = $this->model('Video_model')->hapusVideo($id);
            if ($video) {
                FlasherAlert::setFlashA('Data berhasil dihapus', '', 'success');
                Redirect::to('/video');
                exit;
            }else {
                FlasherAlert::setFlashA('Data gagal dihapus', '', 'error');
                Redirect::to('/video');
                exit;
            }
    
    }


}
