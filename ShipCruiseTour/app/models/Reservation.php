<?php

class Reservation {

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    // Get All Ships
    public function addReservation($data)
    {
        $this->db->query('INSERT INTO reservation (reservation_date , reservation_price , cruise_id , user_id , room_id) VALUES(:reservation_date, :reservation_price , :cruise_id , :user_id , :room_id)');
        // Bind values
        $this->db->bind(':reservation_date', $data['reservation_date']);
        $this->db->bind(':reservation_price', $data['reservation_price']);
        $this->db->bind(':cruise_id', $data['cruise_id']);
        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':room_id', $data['room_id']);
        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}