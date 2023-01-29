<?php
class Pages extends Controller
{

  private $cruiseModel;
  private $portModel;
  private $shipModel;

  public function __construct()
  {
    $this->cruiseModel = $this->model('Cruise');
    $this->portModel = $this->model('Port');
    $this->shipModel = $this->model('Ship');
  }

  public function index()
  {
    $this->view('pages/index');
  }

  public function contact()
  {
    $this->view('pages/contact');
  }

  public function cruises()
  {
    if (!isset($_SESSION['user_id'])) {
      redirect('users/login');
    }
    $cruises = $this->cruiseModel->getCruises();
    $ports = $this->portModel->getPorts();
    $ships = $this->shipModel->getShips();
    $data = [
      'cruises' => $cruises,
      'ports' => $ports ,
      'ships' => $ships
    ];
    $this->view('pages/cruises', $data);
  }
}
