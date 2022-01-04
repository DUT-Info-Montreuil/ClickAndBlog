<?php
class Connexion{
    protected static $bdd;
    
    /***** annaelmoussa.me */
    private static $dns = 'mysql:host=annaelmoussa.me;dbname=dzkq5840_Click&Blog';
    private static $user = 'dzkq5840_lotfi_touil';
    private static $password  = '5Q[=LO}uk=.f';

      /***** IUT de Montreuil */
    // private static $dns = 'mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=';
    // private static $user = '';
    // private static $password  = '';

    public static function initConnexion(){
        self::$bdd = new PDO(self::$dns,self::$user,self::$password);
    }
}
?>