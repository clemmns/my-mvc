<?php

class Manager
{
    protected static $pdo = NULL;

    protected function getPdo()
    {
        if(self::$pdo == NULL){
            try{
                self::$pdo = new PDO('mysql:host=localhost;dbname=mvc-blog','root','', [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
            }
            catch (PDOexception $e) {
                echo 'Error : ' . $e->getMessage();
                die;
            }
        }
        return self::$pdo;
    }

}