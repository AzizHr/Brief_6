<?php
class Cruise
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  //Get All Cruises
  public function allCruises()
  {
    $this->db->query('SELECT cruises.* , ports.port_name AS "starting_port_name" , ships.ship_name FROM cruises INNER JOIN ports ON cruises.starting_port = ports.port_id INNER JOIN ships ON cruises.ship_id = ships.ship_id');
    $cruises = $this->db->all();
    return $cruises;
  }

  public function dates_ids()
  {
    $this->db->query('SELECT cruise_id , starts_at FROM cruises');
    $dates_ids = $this->db->all();
    return $dates_ids;
  }

  public function filterByPort($port_id)
  {
    $this->db->query('SELECT cruises.* , ports.port_name AS "starting_port_name" , ships.ship_name FROM cruises INNER JOIN ports ON cruises.starting_port = ports.port_id INNER JOIN ships ON cruises.ship_id = ships.ship_id AND cruises.starting_port = :port_id');
    $this->db->bind(':port_id', $port_id);
    $cruises = $this->db->all();
    return $cruises;
  }

  public function filterByShip($ship_id)
  {
    $this->db->query('SELECT cruises.* , ports.port_name AS "starting_port_name" , ships.ship_name FROM cruises INNER JOIN ports ON cruises.starting_port = ports.port_id INNER JOIN ships ON cruises.ship_id = ships.ship_id AND cruises.ship_id = :ship_id');
    $this->db->bind(':ship_id', $ship_id);
    $cruises = $this->db->all();
    return $cruises;
  }

  public function filterByDate($cruise_id)
  {
    $this->db->query('SELECT cruises.* , ports.port_name AS "starting_port_name" , ships.ship_name FROM cruises INNER JOIN ports ON cruises.starting_port = ports.port_id INNER JOIN ships ON cruises.ship_id = ships.ship_id AND cruises.cruise_id = :cruise_id');
    $this->db->bind(':cruise_id', $cruise_id);
    $cruises = $this->db->all();
    return $cruises;
  }

  // Store New Cruise in The Database
  public function store($data)
  {
    $this->db->query('INSERT INTO cruises (title , cruise_price , image , number_of_nights , starting_port , ship_id , itinerary , starts_at) VALUES (:title , :cruise_price , :image , :number_of_nights , :starting_port , :ship_id , :itinerary , :starts_at)');
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':cruise_price', $data['cruise_price']);
    $this->db->bind(':image', $data['image']);
    $this->db->bind(':number_of_nights', $data['number_of_nights']);
    $this->db->bind(':starting_port', $data['starting_port']);
    $this->db->bind(':ship_id', $data['ship_id']);
    $this->db->bind(':itinerary', $data['itinerary']);
    $this->db->bind(':starts_at', $data['starts_at']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function updateWithImage($data)
  {
    $this->db->query('UPDATE cruises SET title = :title , cruise_price = :cruise_price , image = :image , number_of_nights = :number_of_nights , starting_port = :starting_port , ship_id = :ship_id , itinerary = :itinerary , starts_at = :starts_at WHERE cruise_id = :cruise_id');
    $this->db->bind(':cruise_id', $data['cruise_id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':cruise_price', $data['cruise_price']);
    $this->db->bind(':image', $data['image']);
    $this->db->bind(':number_of_nights', $data['number_of_nights']);
    $this->db->bind(':starting_port', $data['starting_port']);
    $this->db->bind(':ship_id', $data['ship_id']);
    $this->db->bind(':itinerary', $data['itinerary']);
    $this->db->bind(':starts_at', $data['starts_at']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function updateWithoutImage($data)
  {
    $this->db->query('UPDATE cruises SET title = :title , cruise_price = :cruise_price , number_of_nights = :number_of_nights , starting_port = :starting_port , ship_id = :ship_id , itinerary = :itinerary , starts_at = :starts_at WHERE cruise_id = :cruise_id');
    $this->db->bind(':cruise_id', $data['cruise_id']);
    $this->db->bind(':title', $data['title']);
    $this->db->bind(':cruise_price', $data['cruise_price']);
    $this->db->bind(':number_of_nights', $data['number_of_nights']);
    $this->db->bind(':starting_port', $data['starting_port']);
    $this->db->bind(':ship_id', $data['ship_id']);
    $this->db->bind(':itinerary', $data['itinerary']);
    $this->db->bind(':starts_at', $data['starts_at']);

    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  public function find($cruise_id)
  {
    $this->db->query('SELECT * FROM cruises WHERE cruise_id = :cruise_id');
    $this->db->bind(':cruise_id', $cruise_id);
    $cruise = $this->db->single();
    return $cruise;
  }

  public function destroy($cruise_id)
  {
    $this->db->query('DELETE FROM cruises WHERE cruise_id = :cruise_id');
    $this->db->bind(':cruise_id', $cruise_id);
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }
}
