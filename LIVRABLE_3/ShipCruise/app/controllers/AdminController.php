<?php


class AdminController {

    public function auth() {

        View::load('login');

    }

    public function cruise() {

        View::load('register');

    }

}