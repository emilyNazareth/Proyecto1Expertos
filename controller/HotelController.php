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

    public function showSiteAddress()
    {
        $id = $_GET['id'];
        $maps = array(
            'iframe'            
        );
        if ($id == "Columbus") {
            $maps['iframe'] = "\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15719.786712391648!2d-84.1043112!3d9.9383948!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7ff100312c2c5bbc!2sHotel%20Columbus!5e0!3m2!1ses-419!2scr!4v1621452994876!5m2!1ses-419!2scr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"";
        } else if ($id == "ibza") {
            $maps['iframe'] = "\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15735.051931428452!2d-84.6299896!3d9.6156654!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1727a6d52574182f!2sHotel%20Ibiza!5e0!3m2!1ses-419!2scr!4v1621453174766!5m2!1ses-419!2scr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"";
        } else {
            $maps['iframe'] = "\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15716.712782731527!2d-84.195378!3d10.002135!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbc0686749c35c017!2sHampton%20Inn%20%26%20Suites%20by%20Hilton%20San%20Jose%20Airport%20Costa%20Rica!5e0!3m2!1ses-419!2scr!4v1621453255984!5m2!1ses-419!2scr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"";
        }

        $this->view->show("addressSiteView.php", $maps);
    }
    public function getRoute ()
    {                 
        $this->view->show("mapDetailRoute.php");
    }
}
