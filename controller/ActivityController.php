<?php

class ActivityController
{

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Show activity view
     */

    public function showActivityView()
    {
        $this->view->show("activityView.php", null);
    }

    /**
     * Get route by activity preferences
     */
    public function getRoutesByActivity()
    {                    
        /**
         * send the stringHTML to javascript ajax to show the result in the view
         */
        echo "Buscando Hotel";
    }
}