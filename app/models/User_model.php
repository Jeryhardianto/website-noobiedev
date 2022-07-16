<?php 

class User_model {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getUserById($id) {
        $this->db->query('SELECT id, username, email, password FROM user WHERE id = :id');
         $this->db->bind('id', $id);

        $this->db->execute();
        return $this->db->resultSet();

    }

    public function cekUser($username){
        $this->db->query("SELECT id,username,password FROM user WHERE username = :username OR email = :username LIMIT 1");
        $this->db->bind('username', $username);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function editUser($data){
        $this->db->query('UPDATE user SET username = :username, email = :email WHERE id = :id');
        $this->db->bind('username', $data['username']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('id', $data['id']);
         $this->db->execute();
        return $this->db->rowCount();

    }
    public function resetpass($data){
        $this->db->query('UPDATE user SET password = :password WHERE id = :id');
        $this->db->bind('password', $data['password']);
        $this->db->bind('id', $data['id']);
         $this->db->execute();
        return $this->db->rowCount();

    }





}