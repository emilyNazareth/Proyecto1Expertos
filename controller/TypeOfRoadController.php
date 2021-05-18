<?php

class TypeOfRoadController
{

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Show Type Of Road view
     */

    public function showTypeOfRoadView()
    {
        $this->view->show("typeOfRoadView.php", null);
    }

    /**
     * Get by Type Of Road
     */
    public function getByTypeOfRoad()
    {                    
        /**
         * send the stringHTML to javascript ajax to show the result in the view
         */
        echo "Buscando Sitio";
    }
}
