<?php


class ClientController extends Client {

    public function login() {

        View::load('login');

    }

    public function register() {

        View::load('register');

    }

    public function authentification() {

        $db = new Client();

        $data = array(
            'email' => $_POST['email'] ,
            'password' => $_POST['password'] 
        );

        $data1['user'] = $db->auth($data);
        View::load('profile' , $data1);

    }


}