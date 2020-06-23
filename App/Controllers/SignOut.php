<?php

    namespace App\Controllers;


    use App\Controller;
    use App\Models\User;
    use App\View;

    class SignOut extends Controller
    {

        public function handle()
        {
            $view = new View();
            return $view->render(__DIR__.'/../../Templates/signout.php');
        }

        protected function access(): bool
        {
            return true;
        }
    }