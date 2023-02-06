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
        $this->db->query('INSERT INTO cruise (name , price, image , nights_number, starting_date, starting_port , ship_id) VALUES(:name , :price, :image , :nights_number, :starting_date, :starting_port , :ship_id)');
        // Bind values
        $this->db->bind(':name', $data['name']);
        $this->db->bind(':price', $data['price']);
        $this->db->bind(':image', $data['cruise_img']);
        $this->db->bind(':nights_number', $data['nights_number']);
        $this->db->bind(':starting_date', $data['starting_date']);
        $this->db->bind(':starting_port', $data['starting_port']);
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
        $this->db->query('SELECT cruise.* , port.name AS "starting_port_name" , ship.name AS "ship_name" FROM cruise INNER JOIN port ON cruise.starting_port = port.id INNER JOIN ship ON cruise.ship_id = ship.id');

        $row = $this->db->resultSet();

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    public function getRoomTypes()
    {
        $this->db->query('SELECT * FROM type_of_room');

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
        $this->db->query('SELECT cruise.id , cruise.name , cruise.price , cruise.image , cruise.nights_number , cruise.starting_date , cruise.ship_id , cruise.traji , port.name as "starting_port" from cruise inner join port on port.id = cruise.starting_port and port.name = :name');
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
