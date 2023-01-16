<?php

class Reservation {

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getReservations($userId)
    {
        $this->db->query('SELECT * FROM reservation WHERE user_id = :userId');
        $this->db->bind(':userId', $userId);
        $row = $this->db->resultSet();

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    public function addReservation($data)
    {
      
        $this->db->query('INSERT INTO reservation (reservation_price , cruise_id , user_id , room_id) VALUES(:reservation_price , :cruise_id , :user_id , :room_id)');
        // Bind values
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

    public function cancelReservation($reservationId)
    {
        $this->db->query('DELETE from reservation where cruise_id in (select id from cruise where DATEDIFF(starting_date , CURDATE()) > 2) and id = :id');
        $this->db->bind(':id', $reservationId);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

}