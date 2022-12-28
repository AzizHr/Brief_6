<?php
  class Pages extends Controller {
    public function __construct(){
    $this->cruiseModel = $this->model('Cruise');
    }
    
    public function index(){
      $this->view('pages/index');
    }

    public function contact(){
      $this->view('pages/about');
    }

    public function cruises() {
    $cruises = $this->cruiseModel->getCruises();
    $data = [
      'cruises' => $cruises
    ];
    $this->view('pages/cruises', $data);
    }

  }