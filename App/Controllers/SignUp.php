<?php
    /**
     * Created by PhpStorm.
     * User: Mas4erLomas4er
     * Date: 23.06.2020
     * Time: 18:42
     */

    namespace App\Controllers;


    use App\Controller;
    use App\Models\User;
    use App\View;

    class SignUp extends Controller
    {

        public function handle()
        {
            $user = new User();
            $view = new View();
            $view->user = $user;
            return $view->render(__DIR__.'/../../Templates/signup.php');
        }

        protected function access(): bool
        {
            return true;
        }
    }