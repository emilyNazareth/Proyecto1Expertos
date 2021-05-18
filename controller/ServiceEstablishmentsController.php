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
    public function getServiceEstablishments ()
    {                    
        /**
         * send the stringHTML to javascript ajax to show the result in the view
         */
        echo "Buscando Sitio";
    }
}
