<?php
class Connexion{
    protected static $bdd;
    // private static $dns='mysql:host=localhost;dbname=blog';
    // private static $user='root';
    // private static $password='';
        /***** IUT */
        private static $dns = 'mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201660';
        private static $user = 'dutinfopw201660';
        private static $password  = 'munupeby';
        
    public static function initConnexion(){
        self::$bdd = new PDO(self::$dns,self::$user,self::$password);
    }
}

?>