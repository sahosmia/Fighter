<?php

require_once "core/functions.php";

class HomeController {
    public function index() {
        view('frontend/home');
    }
}
