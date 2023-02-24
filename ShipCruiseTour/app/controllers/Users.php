<?php
class Users extends Controller
{

  private $userModel;
  private $reservationModel;
  private $cruiseModel;

  public function __construct()
  {
    $this->userModel = $this->model('User');
    $this->reservationModel = $this->model('Reservation');
    $this->cruiseModel = $this->model('Cruise');
  }

  public function my_reservations()
  {
    if (!isset($_SESSION['user_id'])) {
      redirect('users/login');
    }
    $data = [
      'my_reservations' => $this->reservationModel->getUserReservations($_SESSION['user_id'])
    ];
    $this->view('users/my_reservations', $data);
  }
  public function reserve($cruise_id)
  {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

      $reservation_price = $this->reservationModel->getWholePrice($cruise_id , $_POST['type_of_room']);
      // var_dump($_POST['cruise_id']);
      // exit;
      $data = [
        'price' => $reservation_price,
        'cruise_id' => $cruise_id ,
        'type_of_room' => $_POST['type_of_room'],
        'user_id' => $_SESSION['user_id']
      ];

      $target_ship_id = $this->reservationModel->getShipId($data['cruise_id']);


      $room_data = [
        'type_of_room' => $_POST['type_of_room'],
        'ship_id' => $target_ship_id
      ];




      if (!$this->reservationModel->getShipCapacity($data['cruise_id'])) {
        if ($this->reservationModel->add($data)) {
          if ($this->reservationModel->increaseShip($data['cruise_id'])) {
            // $room_number = $this->reservationModel->getReservedRooms($target_ship_id);
            // var_dump($room_number);
            // die;
            $i = 1;
            $room_data['number_of_room'] = $i;
            if ($this->reservationModel->createRoomAfterBooking($room_data)) {
              flash('message', 'Booked With Success');
              redirect('users/my_reservations');
            }
          }
        } else {
          flash('message', 'Error Booking!' , 'alert alert-danger');
          redirect('users/my_reservations');
        }
      } else {
        flash('message', 'This Ship is Full' , 'alert alert-danger');
        redirect('users/my_reservations');
      }
    } else {
      $cruise = $this->cruiseModel->getCruise($cruise_id);
      $room_types = $this->cruiseModel->getRoomTypes();
      $data = [
        'room_types' => $room_types,
        'cruise' => $cruise
      ];

      $this->view('users/reserve', $data);
    }
  }


  public function cancel($reservation_id)
  {
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
      if ($this->reservationModel->getShipIdBeforeDeletingUserReservation($reservation_id) != false) {
        $ship_id = $this->reservationModel->getShipIdBeforeDeletingUserReservation($reservation_id);
        if ($this->reservationModel->cancelUserReservation($reservation_id)) {
          flash('message', 'Canceled With Success');
          redirect('users/my_reservations');
          if ($this->reservationModel->decreaseShip($ship_id)) {
            // echo json_encode(['success' => 'canceled!']);
          }
        } else {
          flash('message', 'Out of Date!', 'alert alert-danger');
          redirect('users/my_reservations');
          // echo json_encode(['error' => 'out of date!']);
        }
      }
    }
  }

  public function register()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, 513);

      // Init data
      $data = [
        'first_name' => trim($_POST['first_name']),
        'last_name' => trim($_POST['last_name']),
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'role' => 0,
        'confirm_password' => trim($_POST['confirm_password']),
        'first_name_err' => '',
        'last_name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''

      ];

      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Pleae enter email';
      } else {
        // Check email
        if ($this->userModel->findUserByEmail($data['email'])) {
          $data['email_err'] = 'Email is already taken';
        }
      }

      // Validate Name
      if (empty($data['first_name'])) {
        $data['first_name_err'] = 'Pleae enter first name';
      }

      if (empty($data['last_name'])) {
        $data['last_name_err'] = 'Pleae enter last name';
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Pleae enter password';
      } elseif (strlen($data['password']) < 8) {
        $data['password_err'] = 'Password must be at least 6 characters';
      }

      // Validate Confirm Password
      if (empty($data['confirm_password'])) {
        $data['confirm_password_err'] = 'Pleae confirm password';
      } else {
        if ($data['password'] != $data['confirm_password']) {
          $data['confirm_password_err'] = 'Passwords do not match';
        }
      }

      // Make sure errors are empty
      if (empty($data['email_err']) && empty($data['first_name_err']) && empty($data['last_name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
        // Validated

        // Hash Password
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        // Register User
        if ($this->userModel->register($data)) {
          flash('register_success', 'You are registered and can log in');
          redirect('users/login');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('users/register', $data);
      }
    } else {
      // Init data
      $data = [
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'password' => '',
        'confirm_password' => '',
        'first_name_err' => '',
        'last_name_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => ''
      ];

      // Load view
      $this->view('users/register', $data);
    }
  }

  public function login()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form
      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

      // Init data
      $data = [
        'email' => trim($_POST['email']),
        'password' => trim($_POST['password']),
        'email_err' => '',
        'password_err' => '',
      ];

      // Validate Email
      if (empty($data['email'])) {
        $data['email_err'] = 'Pleae enter email';
      }

      // Validate Password
      if (empty($data['password'])) {
        $data['password_err'] = 'Please enter password';
      }

      // Check for user/email
      if ($this->userModel->findUserByEmail($data['email'])) {
        // User found

      } else {
        // User not found
        $data['email_err'] = 'No user found';
      }

      // Make sure errors are empty
      if (empty($data['email_err']) && empty($data['password_err'])) {
        // Validated
        // Check and set logged in user
        $loggedInUser = $this->userModel->login($data['email'], $data['password']);

        if ($loggedInUser) {
          // Create Session
          $this->createUserSession($loggedInUser);
        } else {
          $data['password_err'] = 'Password incorrect';

          $this->view('users/login', $data);
        }
      } else {
        // Load view with errors
        $this->view('users/login', $data);
      }
    } else {
      // Init data
      $data = [
        'email' => '',
        'password' => '',
        'email_err' => '',
        'password_err' => '',
      ];

      // Load view
      $this->view('users/login', $data);
    }
  }

  public function createUserSession($user)
  {
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['user_email'] = $user['email'];
    $_SESSION['user_name'] = $user['first_name'];
    redirect('pages/cruises');
  }

  public function logout()
  {
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email']);
    unset($_SESSION['user_name']);
    session_destroy();
    redirect('users/login');
  }

  public function isLoggedIn()
  {
    if (isset($_SESSION['user_id'])) {
      return true;
    } else {
      return false;
    }
  }
}
