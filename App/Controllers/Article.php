<?php

    namespace App\Controllers;


    use App\Controller;
    use App\View;

    class Article extends Controller
    {
        public function handle()
        {
            $article = \App\Models\Article::loadById($_GET['id']);

            $view = new View();
            $view->article = $article;
            return $view->render(__DIR__.'/../../Templates/article.php');
        }


        protected function access(): bool
        {
            return isset($_GET['user']) && $_GET['user'] == '123';
        }
    }