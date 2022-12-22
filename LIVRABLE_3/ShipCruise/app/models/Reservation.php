<?php


class Reservation extends Db
{

    public function getRoomType()
    {

        $query = Db::connect()->prepare('SELECT * FROM room_type');
        $query->execute();
        $res = $query->fetchAll();
        return $res;

    }
    public function getAllCruises() {

        $query = Db::connect()->prepare('SELECT * FROM ship');
        $query->execute();
        $res = $query->fetchAll();
        return $res;

    }

}
