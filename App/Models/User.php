<?php

    namespace App\Models;


    use App\Model;

    class User extends Model
    {
        public const TABLE = 'users';
        public const UNIQUE_COLS = ['login', 'password'];
        public $login = NULL;
        public $password = NULL;
    }