<?php

class ServiceEstablishmentsController
{

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Show Service Establishments view
     */

    public function showServiceEstablishments()
    {
        $this->view->show("serviceEstablishmentsView.php", null);
    }

    /**
     * Get Service Establishments 
     */
 
    public function getRoute ()
    {                 
        $this->view->show("mapDetailRoute.php");
    }
}
