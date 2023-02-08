<?php
class Ship
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Add Ship
    public function addShip($data)
    {
        $this->db->query('INSERT INTO ship (name , rooms_number , places_number) VALUES(:name, :rooms_number , :places_number)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':rooms_number', $data['rooms_number']);
        $this->db->bind(':places_number', $data['places_number']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get All Ships
    public function getShips()
    {
        $this->db->query('SELECT * FROM ship');

        if($row = $this->db->resultSet()) {
            return $row;
        } else {
            return false;
        }
    }

    // Get One Ship
    public function getShip($id)
    {
        $this->db->query('SELECT * FROM ship WHERE id = :id');
        $this->db->bind(':id', $id);

        if($row = $this->db->single()) {
            return $row;
        } else {
            return false;
        }
    }


    // Edit One Ship
    public function editShip($id, $data)
    {
        $this->db->query('UPDATE ship SET name = :name , rooms_number = :rooms_number , places_number = :places_number WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':rooms_number', $data['rooms_number']);
        $this->db->bind(':places_number', $data['places_number']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Delete One Ship
    public function deleteShip($id)
    {
        $this->db->query('DELETE FROM ship WHERE id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
