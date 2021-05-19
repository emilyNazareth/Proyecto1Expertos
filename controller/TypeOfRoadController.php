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
       $id = $_GET['id'];
        $maps = array(
            'iframe'            
        );
        if ($id == "Prusia") {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.762372360093!2d-83.88357638543553!3d9.95371849288291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0dc3718d9f1df%3A0x7b04782554ffbaa6!2sSector%20Prusia%20Volc%C3%A1n%20Iraz%C3%BA!5e0!3m2!1ses!2scr!4v1621400148952!5m2!1ses!2scr' width='600' height='450' style='border:0;' allowfullscreen=' loading='lazy'";
        } else if ($id == "Ujarrás") {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7862.468161741282!2d-83.83527202663616!3d9.83069712186937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x58abc4f824859656!2sLas%20Ruinas%20de%20Ujarr%C3%A1s!5e0!3m2!1ses!2scr!4v1621400059538!5m2!1ses!2scr' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'";
        } else {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.0155487816246!2d-83.88538248543573!3d9.932662692897317!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0de8234d5d96d%3A0x274fa4908249891b!2sSanatorio%20Dr.%20Carlos%20Dur%C3%A1n%20Cart%C3%ADn!5e0!3m2!1ses!2scr!4v1621400204313!5m2!1ses!2scr' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'";
        }
        $this->view->show("addressSiteView.php", $maps);
    }
}
