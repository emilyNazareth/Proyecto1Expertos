<?php

class TouristController
{

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Show Recommended Site view
     */

    public function showTouristView()
    {
        $this->view->show("touristView.php", null);
    }

    /**
     * Get Recommended Site
     */
    public function getRoutesByTourist()
    {                    
        /**
         * send the stringHTML to javascript ajax to show the result in the view
         */
        echo "Buscando Turista";
    }
}
