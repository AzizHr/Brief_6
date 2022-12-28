<?php
class Cruise
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Add Cruise
    public function addCruise($data)
    {
        $this->db->query('INSERT INTO cruise (price, image , nights_number, starting_date , ship_id) VALUES(:price, :image , :nights_number, :starting_date , :ship_id)');
        // Bind values
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':image', $data['cruise_img']);
        $this->db->bind(':nights_number', $data['nights_number']);
        $this->db->bind(':starting_date', $data['starting_date']);
        $this->db->bind(':ship_id', $data['ship_id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get All Cruises
    public function getCruises(){
            $this->db->query('SELECT cruise.id , cruise.name , cruise.price , cruise.image , cruise.nights_number , cruise.starting_date , cruise.ship_id , ship.id , ship.name as "ship_name" from cruise inner join ship on cruise.ship_id = ship.id');

        $row = $this->db->resultSet();

        if ($row) {
            return $row;
        } else {
            return false;
        }

      }

    public function getRoomTypes() {
        $this->db->query('SELECT * FROM room_type');

        if($row = $this->db->resultSet()) {
            return $row;
        } else {
            return false;
        }
    }

    // Get One Cruise
    public function getCruise($id)
    {
        $this->db->query('SELECT * FROM cruise WHERE id = :id');
        $this->db->bind(':id', $id);
        

        $row = $this->db->single();

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    // Edit One Cruise
    public function editCruise($id , $data)
    {
        $this->db->query('UPDATE cruise SET price = :price , image = :image , nights_number = :nights_number , starting_date = :starting_date , ship_id = :ship_id WHERE id = :id');
        $this->db->bind(':id', $id);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':image', $data['cruise_img']);
        $this->db->bind(':nights_number', $data['nights_number']);
        $this->db->bind(':starting_date', $data['starting_date']);
        $this->db->bind(':ship_id', $data['ship_id']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    // Delete One Cruise
    public function deleteCruise($id)
    {
        $this->db->query('DELETE FROM cruise WHERE id = :id');
        $this->db->bind(':id', $id);

        if($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
