<?php

class RestaurantController
{

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Show the view restaurant
     */

    public function showRestaurantView()
    {
        $this->view->show("restaurantView.php", null);
    }

    /**
     * Get the type of student campus and send the info to span label
     */
    public function getRoutesByRestaurant()
    {                    
        /**
         * send the stringHTML to javascript ajax to show the result in the view
         */
        echo "Buscando";
    }
}
