<?php


class Ship {

    public static function getAllShips() {

        $query = Db::connect()->prepare('SELECT * FROM ship');
        $query->execute();
        $res = $query->fetchAll();
        return $res;

    }

}