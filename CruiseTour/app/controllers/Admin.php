<?php
// This is a class called Admin
class Admin extends Controller
{
  private $user;
  private $cruise;
  public function __construct()
  {
    $this->user = $this->model('User');
    $this->cruise = $this->model('Cruise');
  }

  public function index()
  {
    if(!$this->isLoggedIn()) {
      redirect('admin/auth');
    }
    $data = [
      'cruises' => $this->cruise->allCruises(),
    ];

    return $this->view('admin/dashboard/cruises/index', $data);
  }

  public function auth()
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $data = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
      ];

      if ($this->user->findAdminByEmail($data['email'])) {
        if ($this->user->auth($data['email'], $data['password'])) {
          $admin = $this->user->auth($data['email'], $data['password']);
          $this->createAdminSession($admin);
        } else {
          flash('message', 'password incorrect' , 'alert alert-danger');
          redirect('admin/auth');
        }
      } else {
        flash('message', 'No admin found' , 'alert alert-danger');
        redirect('admin/auth');
      }
    } else {
      if($this->isLoggedIn()) {
        redirect('cruises/index');
      }
      return $this->view('admin/auth');
    }
  }

  public function createAdminSession($admin)
  {
    $_SESSION['admin_id'] = $admin->id;
    $_SESSION['admin_email'] = $admin->email;
    $_SESSION['admin_full_name'] = $admin->first_name . ' ' . $admin->last_name;
    redirect('admin/index');
  }

  public function logout()
  {
    unset($_SESSION['admin_id']);
    unset($_SESSION['admin_email']);
    unset($_SESSION['admin_full_name']);
    session_destroy();
    redirect('admin/auth');
  }

  public function isLoggedIn()
  {
    if (isset($_SESSION['admin_id'])) {
      return true;
    } else {
      return false;
    }
  }
}
