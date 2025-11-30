<?php

class Controller {
    public function view($file, $data = []) {
        extract($data);
        require "views/{$file}.php";
    }
}