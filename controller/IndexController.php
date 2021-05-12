<?php

class IndexController {

    public function __construct() {
        $this->view = new View();
    }

    
    /**
     * Show the main view
     */
    public function mostrar() {
        $this->view->show("indexView.php", null);
    }
}
