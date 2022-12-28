<?php
class Users extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('User');
    $this->reservationeModel = $this->model('Reservation');
    $this->cruiseModel = $this->model('Cruise');
  }

  public function reserve()
  {
    // Check for POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Process form

      // Sanitize POST data
      $_POST = filter_input_array(INPUT_POST, 513);


      // Init data
      $data = [
        'reservation_date' => trim($_POST['reservation_date']),
        'reservation_price' => $_POST['reservation_price'],
        'cruise_id' => trim($_POST['cruise_id']),
        'room_id' => $_POST['room_id'],
        'user_id' => '',
        'reservation_date_err' => '',
        // 'reservation_price_err' => '',
        // 'cruise_id_err' => '',
        // 'room_id_err' => ''

      ];

      // move_uploaded_file($data['cruise_img'], URLROOT . 'img/');

      // Validate Email
      if (empty($data['reservation_date'])) {
        $data['reservation_date_err'] = 'Pleae enter date';
      }

      // Validate Name
      if (empty($data['reservation_price'])) {
        $data['reservation_price_err'] = 'Pleae enter a price';
      }

      if (empty($data['cruise_id'])) {
        $data['cruise_id'] = 'Pleae choose a cruise';
      }

      if (empty($data['room_id'])) {
        $data['room_id_err'] = 'Pleae choose a room';
      }

      // Make sure errors are empty
      if (empty($data['reservation_date'])) {

        // Register User
        if ($this->reservationeModel->addReservation($data)) {
          redirect('pages/cruises');
        } else {
          die('Something went wrong');
        }
      } else {
        // Load view with errors
        $this->view('users/reserve', $data);
      }
    } else {
      $roomTypes = $this->cruiseModel->getRoomTypes();
      $cruises = $this->cruiseModel->getCruises();
      $data = [
        'reservation_date' => '',
        'reservation_price' => '',
        'cruise_id' => '',
        'room_id' => '',
        'user_id' => '',
        'reservation_date_err' => '',
        'roomTypes' => $roomTypes ,
        'cruises' => $cruises
      ];

      // Load view
      $this->view('users/reserve', $data);
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
    // $_SESSION['user_name'] = $user->first_name;
    redirect('pages/index');
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
