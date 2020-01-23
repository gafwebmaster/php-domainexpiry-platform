<?php

class Emailexp {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    //Domain list
    public function getList() {
        $this->db->query("SELECT Domain, domainExpiry, hostExpiry FROM Domains ORDER BY domainExpiry DESC");
        $results = $this->db->resultSet();
        return $results;
    }

}
