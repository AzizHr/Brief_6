<?php
class Clients extends Controller
{

  private $user;
  private $reservation;
  private $cruise;

  public function __construct()
  {
    $this->user = $this->model('User');
    $this->reservation = $this->model('Reservation');
    $this->cruise = $this->model('Cruise');
  }

  public function index()
  {
    if (!$this->isLoggedIn()) {
      redirect('clients/login');
    }
    return $this->view('clients/myreservations');
  }

  public function my_reservations()
  {
    if (!$this->isLoggedIn()) {
      redirect('clients/login');
    }
    $client_id = $_SESSION['client_id'];
    $data = [
      'my_reservations' => $this->reservation->allClientReservations($client_id)
    ];

    return $this->view('clients/myreservations', $data);
  }

  public function reserve()
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'price' => 300,
        'room_type' => $_POST['room_type'],
        'client_id' => $_SESSION['client_id'],
        'cruise_id' => $_POST['cruise_id']
      ];

      if ($this->reservation->create($data)) {
        flash('message', 'booked with success');
        redirect('clients/my_reservations');
      } else {
        flash('message', 'this ship is full', 'alert alert-danger');
        redirect('clients/my_reservations');
      }
    } else {
      if (!$this->isLoggedIn()) {
        redirect('clients/login');
      }
      return $this->view('clients/reserve');
    }
  }

  public function register()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'first_name' => $_POST['first_name'],
        'last_name' => $_POST['last_name'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'role' => 0
      ];

      if ($this->user->findClientByEmail($data['email'])) {
        flash('message', 'This email already in use', 'alert alert-danger');
        redirect('clients/login');
      } else {
        $hash_password = password_hash($data['password'], PASSWORD_DEFAULT);
        $data['password'] = $hash_password;

        if ($this->user->register($data)) {
          flash('message', 'Your account created succefully');
          redirect('clients/login');
        }
      }
    } else {
      return $this->view('clients/register');
    }
  }


  public function cancel($reservation_id)
  {
    if (!$this->isLoggedIn()) {
      redirect('clients/login');
    }
    if ($this->reservation->destroy($reservation_id)) {
      flash('message', 'canceled with success');
      redirect('clients/my_reservations/1');
    } else {
      flash('message', 'out of date', 'alert alert-danger');
      redirect('clients/my_reservations/1');
    }
  }

  public function login()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
      ];

      if ($this->user->findClientByEmail($data['email'])) {
        if ($this->user->login($data['email'], $data['password'])) {
          $admin = $this->user->login($data['email'], $data['password']);
          $this->createClientSession($admin);
          return $this->view('clients/myreservations');
        } else {
          flash('message', 'password incorrect', 'alert alert-danger');
          redirect('clients/login');
        }
      } else {
        flash('message', 'No client found', 'alert alert-danger');
        redirect('clients/login');
      }
    } else {
      if ($this->isLoggedIn()) {
        redirect('pages/cruises');
      }
      return $this->view('clients/login');
    }
  }

  public function createClientSession($client)
  {
    $_SESSION['client_id'] = $client->id;
    $_SESSION['client_email'] = $client->email;
    $_SESSION['client_full_name'] = $client->first_name . ' ' . $client->last_name;
    redirect('pages/cruises');
  }

  public function logout()
  {
    unset($_SESSION['client_id']);
    unset($_SESSION['client_email']);
    unset($_SESSION['client_full_name']);
    session_destroy();
    redirect('clients/login');
  }

  public function isLoggedIn()
  {
    if (isset($_SESSION['client_id'])) {
      return true;
    } else {
      return false;
    }
  }
}
