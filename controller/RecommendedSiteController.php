<?php

class RecommendedSiteController
{

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Show Recommended Site view
     */

    public function showRecommendedSiteView()
    {
        $this->view->show("recommendedSiteView.php", null);
    }

    /**
     * Get Recommended Site
     */
    public function getRecommendedSite()
    {                    
        /**
         * send the stringHTML to javascript ajax to show the result in the view
         */
        echo "Buscando Sitio";
    }
}
