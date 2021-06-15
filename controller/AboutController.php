<?php

class AboutController {

    public function __construct() {
        $this->view = new View();
    }    
    /**
     * Show the about view
     */
    public function aboutView() {
        $this->view->show("aboutView.php", null);
    }
    public function getRoute ()
    {                 
        $this->view->show("mapDetailRoute.php");
    }
}
