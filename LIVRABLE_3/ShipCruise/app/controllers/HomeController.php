<?php


class HomeController {

    public function index() {

        $data['title'] = 'Home Page';
        $data['content'] = 'Home Page Content';

        View::load('home' , $data);
    }

}