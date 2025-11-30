<?php
require_once "core/functions.php";

class AboutController {
    public function index() {
        // require "views/frontend/about.php";
        
        view('frontend/about');
    }
}
