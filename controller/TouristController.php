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
        public function showSiteAddress()
    {
        $id = $_GET['id'];
        $maps = array(
            'iframe'            
        );
        if ($id == "Parque Nacional Tapantí - Macizo de la Muerte") {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d470499.4275397464!2d-83.70893549620726!3d9.76414113752537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa121d6c8282e91%3A0xbc93ea2f86658835!2sParque%20Nacional%20Tapant%C3%AD%20-%20Macizo%20de%20la%20Muerte!5e0!3m2!1ses!2scr!4v1621448379614!5m2!1ses!2scr' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'";
        } else if ($id == "Tamarindo") {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15702.04594606016!2d-85.84682468864357!3d10.300888482322959!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f9e39409203c30f%3A0xbb189f5e2cc1f893!2sProvincia%20de%20Guanacaste%2C%20Tamarindo!5e0!3m2!1ses!2scr!4v1621448460526!5m2!1ses!2scr' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'";
        } else {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15704.846355193184!2d-85.84199205006384!3d10.244511953916183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f9e38a9524e6387%3A0x2839c12e9717f21!2sPlaya%20Avellana!5e0!3m2!1ses!2scr!4v1621448610003!5m2!1ses!2scr' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'";
        }

        $this->view->show("addressSiteView.php", $maps);
    }
    public function getRoute ()
    {                 
        $this->view->show("mapDetailRoute.php");
    }
}
