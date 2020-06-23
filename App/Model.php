<?php

    namespace App;


    abstract class Model
    {
        protected $id;


        public static function loadAll()
        {
            $db = new Db();
            $sql = "SELECT * FROM `" . static::TABLE . "`";
            return $db->query($sql, [], static::class);
        }

        public static function loadById($id)
        {
            $db = new Db();
            $sql = "SELECT * FROM `" . static::TABLE . "` WHERE `id` = :id";
            return $db->query($sql, ['id' => $id], static::class)[0];
        }

        public static function loadBy($properties)
        {
            $db = new Db();
            $f_cols = [];
            $data = [];
            foreach ($properties as $key => $value) {
                $f_cols[] = $key.' = :'.$key;
                $data[':'.$key] = $value;
            }
            $sql = "SELECT * FROM `" . static::TABLE . "` WHERE ".implode(', ', $f_cols);
            return $db->query($sql, $data, static::class)[0];
        }

        public function delete($id)
        {
            $db = new Db();
            $sql = "DELETE FROM `" . static::TABLE . "` WHERE `id` = :id";
            return $db->execute($sql, ['id' => $id]);
        }

        public function insert()
        {
//            if ($this->exist())
//                return false;
            $db = new Db();
            $objArr = get_object_vars($this);
            $cols = [];
            $data = [];
            foreach ($objArr as $key => $value) {
                if ($key == 'id')
                    continue;
                $cols[] = $key;
                $data[':'.$key] = $value;
            }
            $sql = "INSERT INTO `" . static::TABLE . "` (" . implode(', ', $cols) . ") VALUES (" . implode(',', array_keys($data)) . ")";
            echo $sql;
            return $db->execute($sql, $data);
        }

        public function update()
        {
            if ($this->exist())
                return false;
            $db = new Db();
            $objArr = get_object_vars($this);
            $f_cols = [];
            $data = [];
            foreach ($objArr as $key => $value) {
                if ($value == NULL)
                    continue;
                if ($key != 'id')
                    $f_cols[] = $key . ' = :' . $key;
                $data[':'.$key] = $value;
            }
            $sql = "UPDATE `" . static::TABLE . "` SET " . implode(',', $f_cols) . " WHERE `id` = :id";
            return $db->execute($sql, $data);
        }

        public function save()
        {
            if ($this->exist())
                return $this->update();

            return $this->insert();

        }

        public function exist()
        {
            $db = new Db();
            $objArr = get_object_vars($this);
            $f_cols = [];
            $data = [];
            foreach (   static::UNIQUE_COLS as $column)
            {
                $f_cols[] = $column . ' = :' . $column;
                $data[$column] = $objArr[$column];
            }
            $sql = 'SELECT * FROM `'.static::TABLE.'` WHERE '.implode(' and ', $f_cols);
            return !empty($db->query($sql, $data, static::class));
        }
        public function getId ()
        {
            return $this->id;
        }
    }


