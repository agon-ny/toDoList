<?php

class database
{

    public static $pdo;

    public static function connect(){

        try{
            if(self::$pdo == null){
                self::$pdo = new PDO("mysql:host=".HOST.";dbname=".DBNAME,USERNAME,PASSWORD);
            }
        } catch (Exception $e){
            echo "Something was wrogn with the database connection :(".$e;
        }

        return self::$pdo;

    }
}