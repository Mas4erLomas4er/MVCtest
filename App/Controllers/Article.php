<?php

    namespace App\Controllers;


    use App\Controller;
    use App\View;

    class Article extends Controller
    {
        protected $article;
        public function handle()
        {
            $view = new View();
            $view->article = $this->article;
            return $view->render(__DIR__.'/../../Templates/article.php');
        }


        protected function access(): bool
        {
            session_start();
            $this->article = \App\Models\Article::loadById($_GET['id']);
            if ($this->article->for_logged) {
                return isset($_SESSION['logged_user']);
            }
            return true;
        }
    }