<?php


class Port extends Db {

    public static function getAllPorts() {

        $query = Db::connect()->prepare('SELECT * FROM port');
        $query->execute();
        $res = $query->fetchAll();
        return $res;

    }


    public function getPort($id) {

        $query = Db::connect()->prepare('SELECT * FROM port WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->execute();
        $res = $query->fetch();
        return $res;

    }
    public function editPort($id , $data) {

        $query = Db::connect()->prepare('UPDATE port SET name = :name , country = :country WHERE id = :id');
        $query->bindParam(':id', $id);
        $query->bindParam(':name', $data['name']);
        $query->bindParam(':country', $data['country']);
        if($query->execute()) {
            return 'updated successfully!';
        }
        else {
            return 'error updating';
        }
        
    }

    public function deletePort($id) {

        $query = Db::connect()->prepare('DELETE FROM port WHERE id = :id');
        $query->bindParam(':id', $id);
        if($query->execute()) {
            return 'deleted successfully!';
        }
        else {
            return 'error deleting';
        }

    }

    public function addPort($data) {

        $query = Db::connect()->prepare('INSERT INTO port (name , country) values (:name , :country)');
        $query->bindParam(':name', $data['name']);
        $query->bindParam(':country', $data['country']);
        if($query->execute()) {
            return 'added successfully!';
        }
        else {
            return 'error adding';
        }

    }

    

}