<?php


class CruiseController extends Cruise
{

    public function index()
    {

        $data1['cruises'] = Cruise::getAllCruises();
        $data1['ports'] = Port::getAllPorts();
        $data1['ships'] = Ship::getAllShips();
        View::load('cruise', $data1);
    }

    public function load()
    {

        $data1['cruises'] = Cruise::getAllCruises();
        $data1['ports'] = Port::getAllPorts();
        $data1['ships'] = Ship::getAllShips();
        View::load('cruise', $data1);
    }

    public function edit($id)
    {
        echo 'updating ' . $id;
    }

    public function delete($id)
    {
        echo 'deleting ' . $id;
    }
}
