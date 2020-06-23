<?php
    include __DIR__ . '/App/autoload.php';

    $class = $_GET['ctrl'] ?? 'Index';
    $class = 'App\Controllers\\'.$class;

    $ctrl = new $class();

    $ctrl->action();


