<?php

class Login {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    //Login user
    public function login($data) {
        $this->db->query('SELECT * FROM Login WHERE Id = :id');

        //Bind values
        $this->db->bind(':id', $data['id']);

        $row = $this->db->single();
        $hashed_password = $row->Password;

        if (password_verify($data['password'], $hashed_password)) {
            return $row;
        }
    }

    //Check if the ip is in bd already
    public function checkIp($ip) {
        $this->db->query('SELECT Ip FROM Ip WHERE Ip=:ip');
        $this->db->bind(':ip', $ip);
        $row = $this->db->single();

        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    //Count the atempts
    public function atemptsNumber($ip) {
        $this->db->query('SELECT Atempts FROM Ip WHERE Ip=:ip');
        $this->db->bind(':ip', $ip);
        $results = $this->db->single();
        //echo $results->Atempts;
        $atemptNumber = $results->Atempts;
        return $atemptNumber;
    }

    public function addIp($data) {
        //If the ip is in bd, will read the atempts, will increment and add the new one

        $this->db->query('INSERT INTO Ip (Ip, Atempts) VALUES (:ip, :atempts)');

        //Bind values        
        $this->db->bind(':ip', $data['ip']);
        $this->db->bind(':atempts', $data['atempts']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Add the incremented atempt value to blacklist 
    public function addIncremented($theAtempts, $ip) {

        $this->db->query('UPDATE Ip SET Atempts=:ressettedAtempts WHERE Ip=:ip');
        //Bind values
        $this->db->bind(':ip', $ip);
        $this->db->bind(':ressettedAtempts', $theAtempts);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}
