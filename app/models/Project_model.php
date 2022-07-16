<?php

class Project_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllProject()
    {
        $this->db->query('SELECT id,nama_project, deskripsi, gambar  FROM project ORDER BY id DESC');
        return $this->db->resultSet();
    }

    public function getAllDetailProject($id)
    {
        $this->db->query('SELECT id,id_project,nama_project, foto  FROM detail_project WHERE id_project=:id ORDER BY id DESC');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }
    public function getAllVideo($id)
    {
        $this->db->query('SELECT id,id_project,nama_video, url  FROM video WHERE id_project=:id ORDER BY id DESC');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }


    public function getDetailProjectById($id)
    {
        $this->db->query('SELECT id,id_project,nama_project, foto  FROM detail_project WHERE id = :id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function getDetailProjectByIdX($id)
    {
        $this->db->query('SELECT id,nama_project, foto  FROM detail_project WHERE id_project = :id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function getVideoById($id,$id_project)
    {
        $this->db->query('SELECT id,id_project,nama_video, url  FROM video WHERE id = :id AND id_project=:id_project');
        $this->db->bind('id', $id);
        $this->db->bind('id_project', $id_project);
        return $this->db->resultSet();
    }
    public function getVideoByIdX($id_project)
    {
        $this->db->query('SELECT id,id_project,nama_video, url  FROM video WHERE  id_project=:id_project ORDER BY id DESC LIMIT 1');
        $this->db->bind('id_project', $id_project);
        return $this->db->resultSet();
    }

    public function getProjectById($id)
    {
        $this->db->query('SELECT nama_project, deskripsi, gambar   FROM project WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }
    public function tambahProject($fields)
    {
        if ($this->db->insert('project', $fields)) {
            return true;
        }
        return $this->db->rowCount();
    }

    public function tambahDetailProject($fields)
    {
        if ($this->db->insert('detail_project', $fields)) {
            return true;
        }
        return $this->db->rowCount();
    }

    public function UpdateDetailProject($data)
    {
        $query = "UPDATE detail_project SET nama_project=:judul,foto=:foto, date_update=:tglUpdate
      WHERE id=:id";
  
        $this->db->query($query);
        $this->db->bind('id', $data['iddetailproject']);
        $this->db->bind('judul', $data['nama_project']);
        $this->db->bind('foto', $data['foto']);
        $this->db->bind('tglUpdate', $data['date_update']);
      
      
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function UpdatelProject($data)
    {
        $query = "UPDATE project SET nama_project=:nama_project,gambar=:gambar, deskripsi=:deskripsi, date_update=:tglUpdate
      WHERE id=:id";
  
        $this->db->query($query);
        $this->db->bind('id', $data['idproject']);
        $this->db->bind('nama_project', $data['nama_project']);
        $this->db->bind('deskripsi', $data['deskripsi']);
        $this->db->bind('gambar', $data['gambar']);
        $this->db->bind('tglUpdate', $data['date_update']);
      
      
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDetailProject($id)
    {
        $query        = "DELETE FROM detail_project WHERE id=:id ";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusProject($id)
    {
        $query        = "DELETE FROM project WHERE id=:id ";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }


     public function tambahVideo($fields)
    {
        if ($this->db->insert('video', $fields)) {
            return true;
        }
        return $this->db->rowCount();
    }
       public function editVideo($data)
    {
        $query = "UPDATE video SET nama_video=:nama_video,url=:url, date_updated=:date_updated
      WHERE id=:id AND id_project=:id_project";
  
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('id_project', $data['id_project']);
        $this->db->bind('nama_video', $data['nama_video']);
        $this->db->bind('url', $data['url']);
        $this->db->bind('date_updated', $data['date_updated']);
      
      
        $this->db->execute();
        return $this->db->rowCount();
    }

      public function hapusVideo($id, $id_project)
    {
        $query        = "DELETE FROM video WHERE id=:id AND id_project=:id_project ";

        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('id_project', $id_project);

        $this->db->execute();
        return $this->db->rowCount();
    }


}