<?php

class Room {

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get All Ships
    public function getRooms()
    {
        $this->db->query('SELECT * FROM room');

        $row = $this->db->resultSet();

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

}