<?php
    function vardump ($var)
    {
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }

    function __autoload($name)
    {
        include __DIR__ . '/../' .str_replace('\\', '/', $name).'.php';
    }
