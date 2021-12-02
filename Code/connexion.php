<?php
class Connexion{
    protected static $bdd;
    private static $dns='mysql:host=localhost;dbname=blog';
    private static $user='root';
    private static $password='';
    public static function initConnexion(){
        self::$bdd = new PDO(self::$dns,self::$user,self::$password);
    }
}

?>