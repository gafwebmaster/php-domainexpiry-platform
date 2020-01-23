<?php

class Domain {

    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    //Domain list
    public function getList() {
        $this->db->query("SELECT * FROM Domains ORDER BY customerName DESC");
        $results = $this->db->resultSet();
        return $results;
    }

    //Black list
    public function getBlacklist() {
        $this->db->query("SELECT * FROM Ip ORDER BY atemptDate DESC");
        $results = $this->db->resultSet();
        return $results;
    }

    //Delete a domain
    public function deleteDomain($id) {
        $this->db->query("DELETE FROM Domains where Id=:id");

        //Bind values
        $this->db->bind(':id', $id);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Resset the ip from blacklist
    public function ressetIp($ip) {

        $this->db->query('UPDATE Ip SET Atempts=:ressettedAtempts WHERE Id=:id');

        //Bind values
        $this->db->bind(':id', $ip);
        $this->db->bind(':ressettedAtempts', $data['ressettedAtempts']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Add a domain
    public function addDomain($data) {
        $this->db->query('INSERT INTO Domains (Domain, customerName, hostingCompany, otherDetails, domainExpiry, hostExpiry) VALUES (:domain, :customerName, :hostingCompany, :otherDetails, :domainExpiry, :hostExpiry)');

        //Bind values        
        $this->db->bind(':domain', $data['domain']);
        $this->db->bind('domainExpiry', $data['domainExpiry']);
        $this->db->bind('hostExpiry', $data['hostExpiry']);
        $this->db->bind('customerName', $data['customerName']);
        $this->db->bind('hostingCompany', $data['hostingCompany']);
        $this->db->bind('otherDetails', $data['otherDetails']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    //Update a domain
    public function updateDomain($data) {
        $this->db->query('UPDATE Domains SET Domain=:domain, customerName=:customerName, hostingCompany=:hostingCompany, otherDetails=:otherDetails, domainExpiry=:domainExpiry, hostExpiry=:hostExpiry WHERE Id=:id');

        //Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':domain', $data['domain']);
        $this->db->bind(':domainExpiry', $data['domainExpiry']);
        $this->db->bind(':hostExpiry', $data['hostExpiry']);
        $this->db->bind(':customerName', $data['customerName']);
        $this->db->bind(':hostingCompany', $data['hostingCompany']);
        $this->db->bind(':otherDetails', $data['otherDetails']);

        //Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getDomainById($id) {
        $this->db->query('SELECT * FROM Domains WHERE Id=:id');
        $this->db->bind(':id', $id);
        $row = $this->db->single();
        return $row;
    }

}
