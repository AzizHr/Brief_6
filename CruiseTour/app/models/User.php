<?php
class User
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  // Regsiter client
  public function register($data)
  {
    $this->db->query('INSERT INTO users (first_name, last_name , email, password , role) VALUES(:first_name, :last_name , :email, :password , :role)');
    // Bind values
    $this->db->bind(':first_name', $data['first_name']);
    $this->db->bind(':last_name', $data['last_name']);
    $this->db->bind(':email', $data['email']);
    $this->db->bind(':password', $data['password']);
    $this->db->bind(':role', $data['role']);

    // Execute
    if ($this->db->execute()) {
      return true;
    } else {
      return false;
    }
  }

  // Login Client
  public function login($email, $password)
  {
    $client = $this->findClientByEmail($email);

    if (password_verify($password, $client->password)) {
      return $client;
    } else {
      return false;
    }
  }

  // Find client by email and role
  public function findClientByEmail($email)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    // Bind value
    $this->db->bind(':email', $email);

    $client = $this->db->single();

    // Check row
    if ($this->db->rowCount() > 0) {
      if ($client->role == 0) {
        return $client;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  // Admin Section

  // Login Admin
  public function auth($email, $password)
  {

    $admin = $this->findAdminByEmail($email);

    if ($password == $admin->password) {
      return $admin;
    } else {
      return false;
    }
  }


  // Find admin by email and role
  public function findAdminByEmail($email)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    // Bind value
    $this->db->bind(':email', $email);

    $admin = $this->db->single();

    // Check row
    if ($this->db->rowCount() == 1) {
      if ($admin->role == 1) {
        return $admin;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}
