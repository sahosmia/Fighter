<?php

// ------------------------------------------------------------
// Normalize URL (remove base folder like /fighter)
// ------------------------------------------------------------
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = trim($uri, '/');

$base = strtolower(basename(__DIR__)); // example: fighter

// remove /fighter/... from URL
if (strpos(strtolower($uri), $base . '/') === 0) {
    $uri = substr($uri, strlen($base) + 1);
}

if ($uri === $base) {
    $uri = '';
}

$method = $_SERVER['REQUEST_METHOD'];


// ------------------------------------------------------------
// ROUTES (STATIC + DYNAMIC)
// ------------------------------------------------------------

$routes = [
    'GET' => [
        ''           => 'HomeController@index',
        'about'      => 'AboutController@index',
        'contact'    => 'ContactController@index',

        // dynamic example
        'item/{name}'     => 'ItemController@show',
        'user/{id}/post/{slug}' => 'UserPostController@show',
    ],

    'POST' => [
        'contact' => 'ContactController@store',
    ]
];

// ------------------------------------------------------------
// 404 handler
// ------------------------------------------------------------
function abort($code = 404) {
    http_response_code($code);

    $file = "views/errors/{$code}.php";
    if (file_exists($file)) {
        require $file;
    } else {
        echo "Error {$code}";
    }
    exit;
}


// ------------------------------------------------------------
// Dynamic route matcher with named parameters
// route: user/{id}/post/{slug}
// regex: user/(?<id>[^/]+)/post/(?<slug>[^/]+)
// ------------------------------------------------------------
function matchDynamicRoute($uri, $routeList)
{
    foreach ($routeList as $pattern => $controllerAction) {

        // Convert {param} to named regex (?<param>[^/]+)
        $regex = preg_replace('/\{([^\/]+)\}/', '(?<$1>[^/]+)', $pattern);

        if (preg_match('#^' . $regex . '$#', $uri, $matches)) {

            $params = [];
            foreach ($matches as $key => $value) {
                if (!is_int($key)) {
                    $params[$key] = $value; // associative params
                }
            }

            return [
                'action' => $controllerAction,
                'params' => $params
            ];
        }
    }

    return false;
}


// ------------------------------------------------------------
// Controller Caller
// ------------------------------------------------------------
function callController($controllerAction, $params = [])
{
    list($controller, $actionMethod) = explode('@', $controllerAction);

    // prevent unsafe characters
    $safePath = preg_replace('/[^a-zA-Z0-9_\/\\\\]/', '', str_replace('\\', '/', $controller));

    $file = "controllers/" . $safePath . ".php";
    if (!file_exists($file)) abort(404);

    require_once $file;

    $controllerClass = str_replace('/', '\\', $controller);

    if (!class_exists($controllerClass)) abort(404);

    $obj = new $controllerClass;

    if (!method_exists($obj, $actionMethod)) abort(404);

    return call_user_func_array([$obj, $actionMethod], array_values($params));
}



// ------------------------------------------------------------
// MAIN ROUTING LOGIC
// ------------------------------------------------------------
if (isset($routes[$method][$uri])) {

    // Static route
    callController($routes[$method][$uri]);

} else {

    // Dynamic route
    $match = matchDynamicRoute($uri, $routes[$method]);

    if ($match !== false) {
        callController($match['action'], $match['params']);
    } else {
        abort(404);
    }
}

?>
