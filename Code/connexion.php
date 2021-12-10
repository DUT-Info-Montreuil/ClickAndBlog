<?php
class Connexion{
    protected static $bdd;
    
    /***** annaelmoussa.me */
    private static $dns = 'mysql:host=annaelmoussa.me;dbname=dzkq5840_Click&Blog';
    private static $user = 'dzkq5840_louis_bonnet';
    private static $password  = '+a6)8}fQaN9Z';

    public static function initConnexion(){
        self::$bdd = new PDO(self::$dns,self::$user,self::$password);
    }
}

?>