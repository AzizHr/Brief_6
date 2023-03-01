<?php
class Ship
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  //Get All Ships
  public function allShips()
  {
    $this->db->query('SELECT * FROM ships');
    $ships = $this->db->all();
    return $ships;
  }

  // Store New Ship in The Database
  public function store($data)
  {
    $this->db->query('INSERT INTO ships (ship_name , number_of_rooms , number_of_places) VALUES (:ship_name , :number_of_rooms , :number_of_places)');
    $this->db->bind(':ship_name', $data['ship_name']);
    $this->db->bind(':number_of_rooms', $data['number_of_rooms']);
    $this->db->bind(':number_of_places', $data['number_of_places']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function update($data)
  {
    $this->db->query('UPDATE ships SET ship_name = :ship_name , number_of_rooms = :number_of_rooms , number_of_places = :number_of_places WHERE ship_id = :ship_id');
    $this->db->bind(':ship_id', $data['ship_id']);
    $this->db->bind(':ship_name', $data['ship_name']);
    $this->db->bind(':number_of_rooms', $data['number_of_rooms']);
    $this->db->bind(':number_of_places', $data['number_of_places']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function find($ship_id)
  {
    $this->db->query('SELECT * FROM ships WHERE ship_id = :ship_id');
    $this->db->bind(':ship_id', $ship_id);
    $ship = $this->db->single();
    return $ship;
  }

  public function destroy($ship_id)
  {
    $this->db->query('DELETE FROM ships WHERE ship_id = :ship_id');
    $this->db->bind(':ship_id', $ship_id);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
