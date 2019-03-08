<?php

class Router {

    public function routeRequest() {

        //itéter tous les parametres get pour savoir si un corresponds à nos controller
        // foreach (){
        //
        // }

        $route = (isset($_GET['w'])) ? $_GET['w'] : 'home_page';
        //Vérifier s'il existe
        require $route.'.php';
    }

}
