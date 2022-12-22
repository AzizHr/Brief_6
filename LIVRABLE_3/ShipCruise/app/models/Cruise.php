<?php


class Cruise {

    public static function getAllCruises() {

        $query = Db::connect()->prepare('SELECT * FROM cruise');
        $query->execute();
        $res = $query->fetchAll();
        return $res;

    }
    

}