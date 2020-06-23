<?php
    session_start();
    unset($_SESSION['logged_user']);
    setcookie('is_logged', false);
    header('Location: /');

