<?php
class Port
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    //Get All Ports
    public function allPorts()
    {
        $this->db->query('SELECT * FROM ports');
        $ports = $this->db->all();
        return $ports;
    }

    // Store New Port in The Database
    public function store($data)
    {
        $this->db->query('INSERT INTO ports (port_name , country) VALUES (:port_name , :country)');
        $this->db->bind(':port_name', $data['port_name']);
        $this->db->bind(':country', $data['country']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function update($data)
    {
        $this->db->query('UPDATE ports SET port_name = :port_name , country = :country WHERE port_id = :port_id');
        $this->db->bind(':port_id', $data['port_id']);
        $this->db->bind(':port_name', $data['port_name']);
        $this->db->bind(':country', $data['country']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function find($port_id)
    {
        $this->db->query('SELECT * FROM ports WHERE port_id = :port_id');
        $this->db->bind(':port_id', $port_id);
        $port = $this->db->single();
        return $port;
    }

    public function destroy($port_id)
    {
        $this->db->query('DELETE FROM ports WHERE port_id = :port_id');
        $this->db->bind(':port_id', $port_id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
