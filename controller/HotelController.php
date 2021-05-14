<?php

class HotelController
{

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Show hotel view
     */

    public function showHotelView()
    {
        $this->view->show("hotelView.php", null);
    }

    /**
     * Get route by Hotel preferenses
     */
    public function getRoutesByHotel()
    {                    
        /**
         * send the stringHTML to javascript ajax to show the result in the view
         */
        echo "Buscando Hotel";
    }
}
