<?php


class Db {

    public static function connect() {

        $database = new PDO('mysql:host=localhost;dbname=shipcruise' , 'root' , '');
        if($database) {
            return $database;
        }
        else {
            echo 'connection error !';
        }

    }

}