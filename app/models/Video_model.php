<?php

class Video_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllVideo()
    {
        $this->db->query('SELECT id,lokasi, url  FROM video_page');
        return $this->db->resultSet();
    }

    public function getVideoById($id)
    {
        $this->db->query('SELECT id,lokasi, url FROM video_page WHERE  id=:id');
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }



     public function tambahVideo($fields)
    {
        if ($this->db->insert('video_page', $fields)) {
            return true;
        }
        return $this->db->rowCount();
    }
       public function editVideo($data)
    {
        $query = "UPDATE video_page SET lokasi=:lokasi,url=:url, date_updated=:date_updated
      WHERE id=:id";
  
        $this->db->query($query);
        $this->db->bind('id', $data['id']);
        $this->db->bind('lokasi', $data['lokasi']);
        $this->db->bind('url', $data['url']);
        $this->db->bind('date_updated', $data['date_updated']);
      
      
        $this->db->execute();
        return $this->db->rowCount();
    }

      public function hapusVideo($id)
    {
        $query        = "DELETE FROM video_page WHERE id=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }


}