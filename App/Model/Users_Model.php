<?php

class Users_Model {
    private $table = 'users';
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function addUser($email, $name, $password) {

        $hash = password_hash($password,
            PASSWORD_DEFAULT);

        $query = 'INSERT INTO ' . $this->table . ' VALUES ' . "('', :email, :name, :password)";

        $this->db->queryPrepare($query);
        $this->db->bind('email', $email);
        $this->db->bind('name', $name);
        $this->db->bind('password', $hash);

        $this->db->queryExecute();

        return $this->db->affectedRows();
    }

    public function getAllUsers(){
        $this->db->queryPrepare('SELECT * FROM ' . $this->table);

        return $this->db->resultBatch();
    }

    public function getPassword($email)
    {
        $this->db->queryPrepare('SELECT password FROM ' . $this->table . ' where email = :email');
        $this->db->bind('email', $email);

        return $this->db->resultSingle();
    }

    public function getName($email)
    {
        $this->db->queryPrepare('SELECT nama FROM ' . $this->table . ' where email = :email');
        $this->db->bind('email', $email);

        return $this->db->resultSingle();
    }
}