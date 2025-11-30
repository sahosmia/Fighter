<?php

require_once "core/functions.php";

class ItemController {
    public function index() {
        view('frontend/items');
    }

    public function show($name) {
        // require "views/frontend/item.php";
        echo "Item: " . htmlspecialchars($name);
    }
}

