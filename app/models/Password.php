<?php

//Update the password
class Password {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function updatePassword($data) {
        $this->db->query('UPDATE Login SET Password=:newPassword WHERE Id=:id');

        //Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':newPassword', $data['newPassword']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
