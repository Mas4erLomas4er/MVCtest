<?php

    namespace App;


    class View
    {
        protected $data = [];
        public function __set($name, $value)
        {
            $this->data[$name] = $value;
        }

        public function __get($name)
        {
            if (isset($this->data[$name]))
                return $this->data[$name];
            return null;
        }

        public function __isset($name)
        {
            return isset($this->data[$name]);
        }

        public function display($path)
        {
            require $path;
        }
        public function render($path)
        {
            ob_start();
            require $path;
        }
        public function addData($key, $value)
        {
            $this->data[$key] = $value;
        }
    }