<?php


class ReservationController extends Reservation {

    public function index() {

        $db = new Reservation();
        $data['room_type'] = $db->getRoomType();
        $data['ships'] = $db->getAllCruises();
        View::load('reservation' , $data);

    }

    // public function edit($id) {

    //     echo 'updating ' . $id;

    // }

    // public function delete($id) {

    //     echo 'deleting ' . $id;

    // }

}