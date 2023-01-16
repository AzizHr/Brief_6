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
    public function getCruises()
    {
        $this->db->query('SELECT cruise.id , cruise.name , cruise.price , cruise.image , cruise.nights_number , cruise.starting_date , cruise.ship_id , ship.id as "shipId" , ship.name as "ship_name" from cruise inner join ship on cruise.ship_id = ship.id');

        $row = $this->db->resultSet();

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    public function getRoomTypes()
    {
        $this->db->query('SELECT r.* , rt.id as "rt_id" , rt.name as "rt_name" , rt.price , rt.capacity from  room r inner join room_type rt on r.room_type_id = rt.id');

        if ($row = $this->db->resultSet()) {
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
    public function editCruise($id, $data)
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

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getTraji($id) {
        $this->db->query('SELECT p.name from port p inner join cruise_port cp on p.id = cp.port_id inner join cruise c on cp.cruise_id = c.id and c.id = :id');
        $this->db->bind(':id', $id);

        if ($this->db->resultSet()) {
            return $this->db->resultSet();
        } else {
            return false;
        }
    }


    public function getPrice($id) {
        $this->db->query('SELECT * FROM cruise WHERE cruise.id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
    public function filterByPort($portName)
    {
        $this->db->query('SELECT c.* from cruise c inner join cruise_port cp on cp.cruise_id = c.id inner join port p on p.id = cp.port_id and p.name = :name');
        $this->db->bind(':name', $portName);
        if ($this->db->resultSet()) {
            return $this->db->resultSet();
        } else {
            return false;
        }
    }

    public function filterByShip($shipName)
    {
        $this->db->query('SELECT c.* from cruise c inner join ship s on c.ship_id = s.id and s.name = :name');
        $this->db->bind(':name', $shipName);
        if ($this->db->resultSet()) {
            return $this->db->resultSet();
        } else {
            return false;
        }
    }

    public function filterByMonth($month)
    {
        $this->db->query('SELECT c.* from cruise c where MONTH(c.starting_date) = :month');
        $this->db->bind(':month', $month);
        if ($this->db->resultSet()) {
            return $this->db->resultSet();
        } else {
            return false;
        }
    }
}
