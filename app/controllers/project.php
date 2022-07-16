<?php
class project extends Controller
{
    public function __construct()
    {
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['title']      = 'Project | '.PROJECT;
        $data['project']    = $this->model('Project_model')->getAllProject();

        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/project', $data);
        $this->view('backend/templates/footer');
    }

    public function _tambah()
    {
        if (@$_POST['project']) {
            $gambar         = $_FILES['gambarProject']['name'];
            //Cek Extensi File
            $file_ext      = strtolower(end(explode('.', $gambar)));
            $extensions     = array("jpeg","jpg","png");

            if (in_array($file_ext, $extensions)=== false) {
                FlasherAlert::setFlashA('Ekstensi tidak diizinkan, pilih file dengan JPEG,JPG,PNG', '', 'error');
                Redirect::to('/project');
                exit;
            }

            //Cek ukuran file
            if ($_FILES['gambarProject']['size'] > 1000000) {
                FlasherAlert::setFlashA('Ukuran gambar minimal 1 MB', '', 'error');
                Redirect::to('/project');
                exit;
            }

            $dirLok     = BASELOKSAVE.'/public/assets/upload/';
            $path       = $_FILES['gambarProject']['tmp_name'];
            $newName    = RandomString::random('30', 'P-');
            rename($path, $dirLok.$newName);
            $data = [
                'nama_project'  => htmlspecialchars($_POST['namaproject']),
                'deskripsi'     => htmlspecialchars($_POST['deskripsi']),
                'gambar'        => $newName,
                'date_create'   => date('Y-m-d H:i:s')
            ];

            $project = $this->model('Project_model')->tambahProject($data);

            if ($project) {
                FlasherAlert::setFlashA('Data berhasil ditambah', '', 'success');
                Redirect::to('/project');
                exit;
            } else {
                FlasherAlert::setFlashA('Data gagal ditambah', '', 'error');
                Redirect::to('/project');
                exit;
            }
        }
    }

    public function detail_project($id)
    {
        Session::set('idproject', $id);
        $data['title']      = 'Detail Project | '.PROJECT;
        $data['idproject']  = $id;
        $data['project']    = $this->model('Project_model')->getProjectById($id);
        // Detail Project
        $data['Dproject']   = $this->model('Project_model')->getAllDetailProject($id);
        // Video
        $data['video']   = $this->model('Project_model')->getAllVideo($id);


        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/detail-project', $data);

        $this->view('backend/templates/footer');
    }

    public function _proses_tambah()
    {
        if (@$_POST['Dproject']) {
            $gambar         = $_FILES['gambarDProject']['name'];
            //Cek Extensi File
            $file_ext      = strtolower(end(explode('.', $gambar)));
            $extensions     = array("jpeg","jpg","png");

            if (in_array($file_ext, $extensions)=== false) {
                FlasherAlert::setFlashA('Ekstensi tidak diizinkan, pilih file dengan JPEG,JPG,PNG', '', 'error');
                Redirect::to('/project/detail_project/'.$_POST['idproject']);
                exit;
            }

            //Cek ukuran file
            if ($_FILES['gambarDProject']['size'] > 1000000) {
                FlasherAlert::setFlashA('Ukuran gambar minimal 1 MB', '', 'error');
                Redirect::to('/project/detail_project/'.$_POST['idproject']);
                exit;
            }
            $dirLok     = BASELOKSAVE.'/public/assets/upload/';
            $path       = $_FILES['gambarDProject']['tmp_name'];
            $newName    = RandomString::random('30', 'DP-');
            rename($path, $dirLok.$newName);

            
            $cekIDproject = $this->model('Project_model')->getDetailProjectByIdX($_POST['idproject']);
            
            if($cekIDproject == false){
                $data = [
                    'id_project'     => $_POST['idproject'],
                    'nama_project'  => htmlspecialchars($_POST['judul']),
                    'foto'        => $newName,
                    'date_create'   => date('Y-m-d H:i:s'),
                    'status'    => 1
                ];
            }else{
                $data = [
                    'id_project'     => $_POST['idproject'],
                    'nama_project'  => htmlspecialchars($_POST['judul']),
                    'foto'        => $newName,
                    'date_create'   => date('Y-m-d H:i:s'),
                ];
            }

            $DetailProject = $this->model('Project_model')->tambahDetailProject($data);

            if ($DetailProject) {
                FlasherAlert::setFlashA('Data berhasil ditambah', '', 'success');
                Redirect::to('/project/detail_project/'.$_POST['idproject']);
                exit;
            } else {
                FlasherAlert::setFlashA('Data gagal ditambah', '', 'error');
                Redirect::to('/project/detail_project/'.$_POST['idproject']);
                exit;
            }
        }
    }

    public function project_edit($id)
    {
        $data['title']      = 'Edit Project | '.PROJECT;
        $data['idprojectx']  = $id;
        $data['project']    = $this->model('Project_model')->getProjectById($id);

        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/edit-project', $data);

        $this->view('backend/templates/footer');
    }

    public function _proses_edit_project()
    {
        if (@$_POST['editProject']) {
            $gambar         = $_FILES['EditGambar']['name'];
            if ($gambar) {
                //Cek Extensi File
                $file_ext      = strtolower(end(explode('.', $gambar)));
                $extensions     = array("jpeg","jpg","png");

                if (in_array($file_ext, $extensions)=== false) {
                    FlasherAlert::setFlashA('Ekstensi tidak diizinkan, pilih file dengan JPEG,JPG,PNG', '', 'error');
                    Redirect::to('/project/project_edit/'.$_POST['idproject']);
                    exit;
                }

                //Cek ukuran file
                if ($_FILES['EditGambar']['size'] > 1000000) {
                    FlasherAlert::setFlashA('Ukuran gambar minimal 1 MB', '', 'error');
                    Redirect::to('/project/project_edit/'.$_POST['idproject']);
                    exit;
                }
                $dirLok     = BASELOKSAVE.'/public/assets/upload/';
                $path       = $_FILES['EditGambar']['tmp_name'];
                $newName    = RandomString::random('30', 'P-');
                rename($path, $dirLok.$newName);
                $data = [
                            'idproject'             => $_POST['idproject'],
                            'nama_project'          => htmlspecialchars($_POST['namaproject']),
                            'deskripsi'             => htmlspecialchars($_POST['deskripsi']),
                            'gambar'                => $newName,
                            'date_update'           => date('Y-m-d H:i:s')
                ];
                $Project = $this->model('Project_model')->UpdatelProject($data);

                if ($Project) {
                    $deleteGambar = $dirLok.$_POST['fotoPrev'];
                    unlink($deleteGambar);
                    FlasherAlert::setFlashA('Data berhasil diubah', '', 'success');
                    Redirect::to('/project/project_edit/'.$_POST['idproject']);
                    exit;
                } else {
                    FlasherAlert::setFlashA('Data gagal diubah', '', 'error');
                    Redirect::to('/project/project_edit/'.$_POST['idproject']);
                    exit;
                }
            } else {
                $data = [
                            'idproject'             => $_POST['idproject'],
                            'nama_project'          => htmlspecialchars($_POST['namaproject']),
                            'deskripsi'             => htmlspecialchars($_POST['deskripsi']),
                            'gambar'                => $_POST['fotoPrev'],
                            'date_update'           => date('Y-m-d H:i:s')
                ];
                $Project = $this->model('Project_model')->UpdatelProject($data);

                if ($Project) {
                    FlasherAlert::setFlashA('Data berhasil diubah', '', 'success');
                    Redirect::to('/project/project_edit/'.$_POST['idproject']);
                    exit;
                } else {
                    FlasherAlert::setFlashA('Data gagal diubah', '', 'error');
                    Redirect::to('/project/project_edit/'.$_POST['idproject']);
                    exit;
                }
            }
        }
    }


    public function project_detail_edit($id)
    {
        $data['title']      = 'Edit Detail Project | '.PROJECT;
        $data['iddetailprojectx']  = $id;
        $data['iddetailproject']    = $this->model('Project_model')->getDetailProjectById($id);


        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/edit-detail-project', $data);

        $this->view('backend/templates/footer');
    }

          
    public function _proses_edit_detail_project()
    {
        if (@$_POST['editDetailProject']) {
            $gambar         = $_FILES['EditgambarDProject']['name'];
            if ($gambar) {
                //Cek Extensi File
                $file_ext      = strtolower(end(explode('.', $gambar)));
                $extensions     = array("jpeg","jpg","png");

                if (in_array($file_ext, $extensions)=== false) {
                    FlasherAlert::setFlashA('Ekstensi tidak diizinkan, pilih file dengan JPEG,JPG,PNG', '', 'error');
                    Redirect::to('/project/project_detail_edit/'.$_POST['iddetailproject']);
                    exit;
                }

                //Cek ukuran file
                if ($_FILES['EditgambarDProject']['size'] > 1000000) {
                    FlasherAlert::setFlashA('Ukuran gambar minimal 1 MB', '', 'error');
                    Redirect::to('/project/project_detail_edit/'.$_POST['iddetailproject']);
                    exit;
                }
                $dirLok     = BASELOKSAVE.'/public/assets/upload/';
                $path       = $_FILES['EditgambarDProject']['tmp_name'];
                $newName    = RandomString::random('30', 'DP-');
                rename($path, $dirLok.$newName);
                $cekIDproject = $this->model('Project_model')->getDetailProjectByIdX($_POST['idproject']);
                if ($cekIDproject == false) {
                $data = [
                            'iddetailproject'        => $_POST['iddetailproject'],
                            'nama_project'      => htmlspecialchars($_POST['judul']),
                            'foto'              => $newName,
                            'date_update'       => date('Y-m-d H:i:s'),
                            'status' => 1
                ];
                }else{
                    $data = [
                        'iddetailproject'        => $_POST['iddetailproject'],
                        'nama_project'      => htmlspecialchars($_POST['judul']),
                        'foto'              => $newName,
                        'date_update'       => date('Y-m-d H:i:s')
                      ];
                }
                $DetailProject = $this->model('Project_model')->UpdateDetailProject($data);

                if ($DetailProject) {
                    $deleteGambar = $dirLok.$_POST['fotoPrev'];
                    unlink($deleteGambar);
                    FlasherAlert::setFlashA('Data berhasil diubah', '', 'success');
                    Redirect::to('/project/project_detail_edit/'.$_POST['iddetailproject']);
                    exit;
                } else {
                    FlasherAlert::setFlashA('Data gagal diubah', '', 'error');
                    Redirect::to('/project/project_detail_edit/'.$_POST['iddetailproject']);
                    exit;
                }
            } else {
                $data = [
                            'iddetailproject'   => $_POST['iddetailproject'],
                            'nama_project'      => htmlspecialchars($_POST['judul']),
                            'foto'              => $_POST['fotoPrev'],
                            'date_update'       => date('Y-m-d H:i:s')
                ];
                $DetailProject = $this->model('Project_model')->UpdateDetailProject($data);

                if ($DetailProject) {
                    FlasherAlert::setFlashA('Data berhasil diubah', '', 'success');
                    Redirect::to('/project/project_detail_edit/'.$_POST['iddetailproject']);
                    exit;
                } else {
                    FlasherAlert::setFlashA('Data gagal diubah', '', 'error');
                    Redirect::to('/project/project_detail_edit/'.$_POST['iddetailproject']);
                    exit;
                }
            }
        }
    }
    public function project_detail_delete($id)
    {
        $dirLok     = BASELOKSAVE.'/public/assets/upload/';
        $data['detailProject'] = $this->model('Project_model')->getDetailProjectById($id);
        $DetailProject        = $this->model('Project_model')->hapusDetailProject($id);
        if ($DetailProject) {
            $foto          = $data['detailProject']['0']['foto'];
            $foto          = $dirLok . $foto;
            unlink($foto);

            FlasherAlert::setFlashA('Data berhasil dihapus', '', 'success');
            Redirect::to('/project/detail_project/'.Session::get('idproject'));
            exit;
        }
    }

    public function _proses_tambah_video()
    {
        if (@$_POST['AddVideo']) {
            $data = [
                 'id_project'   => htmlspecialchars($_POST['idproject']),
                 'nama_video'  => htmlspecialchars($_POST['nama_video']),
                 'url'         => htmlspecialchars($_POST['url']),
                 'date_created' => date('Y-m-d H:i:s')
              ];

            $video = $this->model('Project_model')->tambahVideo($data);

            if ($video) {
                FlasherAlert::setFlashA('Data berhasil ditambahkan', '', 'success');
                Redirect::to('/project/detail_project/'.$_POST['idproject']);
                exit;
            } else {
                FlasherAlert::setFlashA('Data gagal ditambahkan', '', 'error');
                Redirect::to('/project/detail_project/'.$_POST['idproject']);
                exit;
            }
        }
    }

    public function edit_video($id, $id_project)
    {
        $data['title']      = 'Edit Video | '.PROJECT;
        $data['idvideo']    = $id;
        $data['video']      = $this->model('Project_model')->getVideoById($id, $id_project);

        $this->view('backend/templates/header', $data);
        $this->view('backend/templates/sidebar', $data);
        $this->view('backend/edit-video', $data);

        $this->view('backend/templates/footer');
    }

    public function _proses_edit_video()
    {
        if (@$_POST['editVideo']) {
            $data = [
                 'id'            => htmlspecialchars($_POST['idvideo']),
                 'id_project'    => htmlspecialchars($_POST['idproject']),
                 'nama_video'   => htmlspecialchars($_POST['video']),
                 'url'          => htmlspecialchars($_POST['url']),
                 'date_updated' => date('Y-m-d H:i:s')
              ];

         
                $video = $this->model('Project_model')->editVideo($data);
                  
                if ($video) {
                    FlasherAlert::setFlashA('Data berhasil diubah', '', 'success');
                    Redirect::to('/project/detail_project/'.$_POST['idproject']);
                    exit;
                } else {
                    FlasherAlert::setFlashA('Data gagal diubah', '', 'error');
                    Redirect::to('/project/detail_project/'.$_POST['idproject']);
                    exit;
                }
     
        }
    }

    public function delete_edit_video($id, $idproject){
        $data['video']      = $this->model('Project_model')->getVideoById($id, $idproject);
        if ($data['video']) {
            var_dump($data['video'] );
            $video = $this->model('Project_model')->hapusVideo($id, $idproject);
            if ($video) {
                FlasherAlert::setFlashA('Data berhasil dihapus', '', 'success');
                Redirect::to('/project/detail_project/'.$idproject);
                exit;
            }else {
                FlasherAlert::setFlashA('Data gagal dihapus', '', 'error');
                Redirect::to('/project/detail_project/'.$idproject);
                exit;
            }
        }else {
             FlasherAlert::setFlashA('Data tidak ada', '', 'error');
             Redirect::to('/project/detail_project/'.$idproject);
             exit;

        }
    }



    public function project_delete($id)
    {
        $dirLok             = BASELOKSAVE.'/public/assets/upload/';
        $data['project']    = $this->model('Project_model')->getProjectById($id);
        $Project            = $this->model('Project_model')->hapusProject($id);
        if ($Project) {
            $foto          = $data['project']['0']['gambar'];
            $foto          = $dirLok . $foto;
            unlink($foto);

            FlasherAlert::setFlashA('Data berhasil dihapus', '', 'success');
            Redirect::to('/project');
            exit;
        }
    }
}
