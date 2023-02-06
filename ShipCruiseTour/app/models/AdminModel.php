<?php
class AdminModel
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }



  // Login User
  public function auth($email, $password)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    $hashed_password = $row['password'];
    $role = $row['role'];


    if ($password == $hashed_password && $role == 1) {
      return $row;
    } else {
      return false;
    }
  }

  // Find user by email
  public function findAdminByEmail($email)
  {
    $this->db->query('SELECT * FROM users WHERE email = :email');
    // Bind value
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    // Check row
    if ($this->db->rowCount() == 1) {
      if ($row['role'] == 1) {
        return $row;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }
}
