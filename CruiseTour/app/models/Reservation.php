<?php
class Reservation
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function allClientReservations($client_id)
  {
    $this->db->query('SELECT reservations.* , room_types.room_type_name AS "type_of_room" , cruises.title AS "cruise_title" FROM reservations INNER JOIN room_types ON reservations.room_type = room_types.room_type_id INNER JOIN cruises ON reservations.cruise_id = cruises.cruise_id AND client_id = :client_id');
    $this->db->bind(':client_id', $client_id);
    $reservations = $this->db->all();
    return $reservations;
  }

  public function getAllRoomTypes()
  {
    $this->db->query('SELECT * FROM room_types');
    $room_types = $this->db->all();
    return $room_types;
  }

  public function create($data)
  {
    if ($this->getShipCapacity($data['cruise_id'])) {
      $this->db->query('INSERT INTO reservations (price , room_type , client_id , cruise_id) VALUES (:price , :room_type , :client_id , :cruise_id)');
      $this->db->bind(':price', $data['price']);
      $this->db->bind(':room_type', $data['room_type']);
      $this->db->bind(':client_id', $data['client_id']);
      $this->db->bind(':cruise_id', $data['cruise_id']);
      $this->db->execute();
      $this->updateShipCapacity($this->getShipId($data['cruise_id']), 1);
      $this->updateShipNumberOfPlaces($data['room_type'], $this->getShipId($data['cruise_id']), 0);

      $room_data = [
        'room_number' => 1,
        'room_type' => $data['room_type'],
        'ship_id' => $this->getShipId($data['cruise_id'])
      ];
      $this->createRoomAfterReservedSuccess($room_data);
      return true;
    } else {
      return false;
    }
  }

  public function getShipCapacity($cruise_id)
  {
    $this->db->query('SELECT * FROM ships INNER JOIN cruises ON ships.ship_id = cruises.ship_id AND cruises.cruise_id = :cruise_id');
    $this->db->bind(':cruise_id', $cruise_id);

    $ship = $this->db->single();
    if ($ship->ship_capacity == $ship->number_of_rooms) {
      return false;
    } else {
      return true;
    }
  }

  public function updateShipCapacity($ship_id, $option)
  {
    if ($option == 1) {
      $this->db->query('UPDATE ships SET ship_capacity = ship_capacity + 1 WHERE ship_id = :ship_id');
      $this->db->bind(':ship_id', $ship_id);
      $this->db->execute();
    } else if ($option == 0) {
      $this->db->query('UPDATE ships SET ship_capacity = ship_capacity - 1 WHERE ship_id = :ship_id');
      $this->db->bind(':ship_id', $ship_id);
      $this->db->execute();
    }
  }

  public function getShipId($cruise_id)
  {
    $this->db->query('SELECT * FROM cruises WHERE cruise_id = :cruise_id');
    $this->db->bind(':cruise_id', $cruise_id);
    return $this->db->single()->ship_id;
  }

  public function updateShipNumberOfPlaces($room_type_id, $ship_id, $option)
  {
    if ($room_type_id == 1) {
      $this->incOrdec(1, $ship_id, $option);
    } else if ($room_type_id == 2) {
      $this->incOrdec(2, $ship_id, $option);
    } else if ($room_type_id == 3) {
      $this->incOrdec(6, $ship_id, $option);
    }
  }

  public function incOrdec($value, $ship_id, $option)
  {
    if ($option == 1) {
      $this->db->query('UPDATE ships SET number_of_places = number_of_places + ' . $value . ' WHERE ship_id = :ship_id');
      $this->db->bind(':ship_id', $ship_id);
      $this->db->execute();
    } else if ($option == 0) {
      $this->db->query('UPDATE ships SET number_of_places = number_of_places - ' . $value . ' WHERE ship_id = :ship_id');
      $this->db->bind(':ship_id', $ship_id);
      $this->db->execute();
    }
  }

  public function createRoomAfterReservedSuccess($data)
  {
    $this->db->query('INSERT INTO rooms (room_number , room_type , ship_id) VALUES (:room_number , :room_type , :ship_id)');
    $this->db->bind(':room_number', $data['room_number']);
    $this->db->bind(':room_type', $data['room_type']);
    $this->db->bind(':ship_id', $data['ship_id']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function destroy($reservation_id)
  {
    // var_dump($this->getRoomType($reservation_id));
    // die;
    $cruise_id = $this->getBeforeDestroy($reservation_id);
    $room_type_id = $this->getRoomType($reservation_id);
    if ($this->isOutOfDate($cruise_id)) {
      $this->db->query('DELETE FROM reservations WHERE cruise_id = :cruise_id');
      $this->db->bind(':cruise_id', $cruise_id);
      $this->db->execute();
      $this->updateShipCapacity($this->getShipId($cruise_id), 0);
      $this->updateShipNumberOfPlaces($room_type_id, $this->getShipId($cruise_id), 1);
      return true;
    } else {
      return false;
    }
  }

  public function getBeforeDestroy($reservation_id)
  {
    $this->db->query('SELECT * FROM reservations WHERE reservation_id = :reservation_id');
    $this->db->bind(':reservation_id', $reservation_id);
    return $this->db->single()->cruise_id;
  }


  public function getRoomType($reservation_id)
  {
    $this->db->query('SELECT * FROM reservations WHERE reservation_id = :reservation_id');
    $this->db->bind(':reservation_id', $reservation_id);
    $reservation = $this->db->single();
    return $reservation->room_type;
  }

  public function isOutOfDate($cruise_id)
  {
    $this->db->query('SELECT * FROM cruises WHERE DATEDIFF(starts_at , CURDATE()) > 2 AND cruise_id = :cruise_id');
    $this->db->bind(':cruise_id', $cruise_id);
    $this->db->single();
    if ($this->db->rowCount() == 1) {
      return true;
    } else {
      return false;
    }
  }
}
