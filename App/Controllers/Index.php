<?php

    namespace App\Controllers;


    use App\Controller;
    use App\Models\Article;
    use App\View;

    class Index extends Controller
    {
        public function handle()
        {
            $data = Article::loadAll();
            $view = new View();
            $view->articles = $data;
            return $view->render(__DIR__.'/../../Templates/index.php');
        }

        protected function access(): bool
        {
            return true;
        }
    }