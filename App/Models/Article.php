<?php

    namespace App\Models;

    use App\Model;

    class Article extends Model
    {
        public const TABLE = 'articles';
        public const UNIQUE_COLS = ['title', 'content'];
        public $title = NULL;
        public $content = NULL;
        public $for_logged = false;
    }