<?php

class Profile_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getProfileById($id)
    {
        $this->db->query("SELECT id,profile,gambar FROM profile WHERE id = :id LIMIT 1");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function UpdateProfile($data)
    {
        $query = "UPDATE profile SET profile=:profile,gambar=:gambar WHERE id=:id";
  
        $this->db->query($query);
        $this->db->bind('id', $data['idprofile']);
        $this->db->bind('profile', $data['profile']);
        $this->db->bind('gambar', $data['gambar']);
      
      
        $this->db->execute();
        return $this->db->rowCount();
    }
}