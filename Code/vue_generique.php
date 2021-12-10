<?php

class VueGenerique {

    public function __Construct() {
        ob_start();
    }

    public function getAffichage(){
        return ob_get_clean();
    }
    
}