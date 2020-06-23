<?php


    namespace App;


    abstract class Controller
    {
        public function action ()
        {
            if ($this->access())
                $this->handle();
            else
                echo "Доступ закрыт";
        }

        abstract public function handle ();

        abstract protected function access () : bool;
    }