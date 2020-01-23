<?php

class Authentication {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    //Login user
    public function authentication($password) {
        $this->db->query('SELECT * FROM Login WHERE Password = :password');

        //Bind values
        $this->db->bind(':password', $password);

        $row = $this->db->single();

        if ($row) {
            return true;
        } else {
            return false;
        }
    }

}
