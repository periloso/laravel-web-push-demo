<?php

/*
|--------------------------------------------------------------------------
| Register Namespaces And Routes
|--------------------------------------------------------------------------
|
| When a theme is starting, this file will executed automatically. This helps
| to register some namespaces like translator or view. Also this file
| will load the routes file for each theme. You may also modify
| this file as you want.
|
*/

if (!app()->routesAreCached()) {
    require __DIR__ . '/Routes/web.php';
}

