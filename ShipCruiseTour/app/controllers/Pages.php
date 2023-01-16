<?php
  class Pages extends Controller {

    private $cruiseModel;
    private $portModel;
    
    public function __construct(){
    $this->cruiseModel = $this->model('Cruise');
    $this->portModel = $this->model('Port');
    }
    
    public function index(){
      $this->view('pages/index');
    }

    public function contact(){
      $this->view('pages/about');
    }

    public function cruises() {
      if(!isset($_SESSION['user_id'])) {
      redirect('users/login');
      }
    $cruises = $this->cruiseModel->getCruises();
    $ports = $this->portModel->getPorts();
    $data = [
      'cruises' => $cruises ,
      'ports' => $ports
    ];
    $this->view('pages/cruises', $data);
    }

  }