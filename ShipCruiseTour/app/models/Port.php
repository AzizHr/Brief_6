<?php
class Port
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Add Port
    public function addPort($data)
    {
        $this->db->query('INSERT INTO port (name , country) VALUES(:name, :country)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':country', $data['country']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get All Ports
    public function getPorts(){
        $this->db->query('SELECT * FROM port');

        $row = $this->db->resultSet();

        if ($row) {
            return $row;
        } else {
            return false;
        }

      }

    // Get One Port
    public function getPort($id)
    {
        $this->db->query('SELECT * FROM port WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }


    // Edit One Port
    public function editPort($id , $data)
    {
        $this->db->query('UPDATE port SET name = :name , country = :country WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':country', $data['country']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Delete One Port
    public function deletePort($id)
    {
        $this->db->query('DELETE * FROM port WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
