<?php

class Pages extends Controller
{

    private $cruise;
    private $port;
    private $ship;

    public function __construct()
    {
        $this->cruise = $this->model('Cruise');
        $this->port = $this->model('Port');
        $this->ship = $this->model('Ship');
    }

    public function index()
    {
        return $this->view('pages/index');
    }

    public function cruises()
    {
        $data = [
            'cruises' => $this->cruise->allCruises(),
            'dates_ids' => $this->cruise->dates_ids(),
            'ports' => $this->port->allPorts(),
            'ships' => $this->ship->allShips()
        ];
        return $this->view('pages/cruises', $data);
    }
}
