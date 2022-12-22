<?php


class ShipController extends Ship {

    public function index() {

        $db = new Ship();
        $data['ships'] = $db->getAllShips();
        View::load('ship/index' , $data);

    }

    public function add()
    {
        View::load('ship/add');
    }

}