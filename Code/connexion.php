<?php
class Connexion{
    protected static $bdd;
    
    /***** annaelmoussa.me */
    //  private static $dns = 'mysql:host=annaelmoussa.me;dbname=dzkq5840_Click&Blog';
    //  private static $user = 'dzkq5840_lotfi_touil';
    //  private static $password  = '5Q[=LO}uk=.f';

    private static $dns = 'mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201660';
    private static $user = 'dutinfopw201660';
    private static $password  = 'munupeby';

    public static function initConnexion(){
        self::$bdd = new PDO(self::$dns,self::$user,self::$password);
    }
}

?>