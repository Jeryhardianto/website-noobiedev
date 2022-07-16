<?php

class Contact_model
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getContactById($id)
    {
        $this->db->query("SELECT id,alamat, email, telp, maps, gambar FROM contact WHERE id = :id LIMIT 1");
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function UpdateContact($data)
    {
        $query = "UPDATE contact SET alamat=:alamat,email=:email, telp=:telp, maps=:maps, gambar=:gambar WHERE id=:id";
  
        $this->db->query($query);
        $this->db->bind('id', $data['idcontact']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('telp', $data['telp']);
        $this->db->bind('maps', $data['maps']);
        $this->db->bind('gambar', $data['gambar']);
      
      
        $this->db->execute();
        return $this->db->rowCount();
    }
}