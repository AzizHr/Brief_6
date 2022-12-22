<?php


class Client extends Db
{

    public function auth($data)
    {

        $query = Db::connect()->prepare('SELECT * FROM u_ser WHERE email = :email AND password = :password');
        $query->bindParam(':email', $data['email']);
        $query->bindParam(':password', $data['password']);
        $query->execute();
        $res = $query->fetchAll();
        return $res;
    }
}
