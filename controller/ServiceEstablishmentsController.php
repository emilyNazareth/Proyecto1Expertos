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
        $id = $_GET['id'];
        $maps = array(
            'iframe'            
        );
        if ($id == "JSMTurrialba") {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15722.492075432452!2d-83.644753!3d9.8819604!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x62544a1fd20498f7!2sGasolinera%20JSM!5e0!3m2!1ses-419!2scr!4v1621396786697!5m2!1ses-419!2scr' width='600' height='450' style='border:0;' allowfullscreen=' loading='lazy'";
        } else if ($id == "UNO") {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.880806978571!2d-84.06137228543565!3d9.94387419288967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0e480abca40b3%3A0x99e26c4c9b1fda45!2sGasolinera%20Uno!5e0!3m2!1ses!2scr!4v1621398429881!5m2!1ses!2scr' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'";
        } else {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.268142909186!2d-84.06235488543594!3d9.91161119291179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0e30a17365695%3A0x4934994feed6977b!2sGasolinera%20Delta!5e0!3m2!1ses!2scr!4v1621398744522!5m2!1ses!2scr' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'";
        }
        $this->view->show("addressSiteView.php", $maps);
    }
    public function getRoute ()
    {                 
        $this->view->show("mapDetailRoute.php");
    }
}
