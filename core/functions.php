<?php 
function view($file, $data = []) {
    $viewPath = "views/{$file}.php";

    if (!file_exists($viewPath)) {
        throw new Exception("View file not found: " . $viewPath);
    } 
    // if any data is missing in $data, it will be extracted as variables or show message
    
    if (!is_array($data)) {
        throw new Exception("Data passed to view must be an associative array.");
    }

    

    
    extract($data);
    require $viewPath;
}