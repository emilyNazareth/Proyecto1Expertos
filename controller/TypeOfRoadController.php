<?php

class TypeOfRoadController
{

    public function __construct()
    {
        $this->view = new View();
    }


    /**
     * Get route by Type Of Road preferenses
     */
    public function getRoutesByTypeOfRoad()
    {
        $allRoutes = [];
        require 'model/HotelModel.php';
        require 'controller/Euclides.php';
        $euclidesAlgorithm = new Euclides();
        $hotels = HotelModel::singleton();
        $resultDataBaseSet = $hotels->getHotels($_POST['startingPoint'], $_POST['finalDestination']);
        $dataUserSelected['origin_province'] = $_POST['startingPoint'];
        $dataUserSelected['final_province'] = $_POST['finalDestination'];
        $dataUserSelected['duration_to_' . $_POST['startingPoint']] = $_POST['duration'];
        $dataUserSelected['distance_to_' . $_POST['startingPoint']] = $_POST['distance'];
        $dataUserSelected['road_type'] = $_POST['typeOfRoad'];
        
        $durationString = strval("duration_to_" . $_POST['startingPoint']);
        $distanceString = strval("distance_to_" . $_POST['startingPoint']);
        foreach ($resultDataBaseSet as &$resultDb) {
            $resultDb->road_type = $euclidesAlgorithm->changeRoadTypeValue($resultDb->road_type);
            $resultDb->$durationString = $euclidesAlgorithm->changeDurationValue($resultDb->$durationString);
            $resultDb->$distanceString = $euclidesAlgorithm->changeKmValue($resultDb->$distanceString);
            
        }

        $routes = $euclidesAlgorithm->calculateDistance(
            $dataUserSelected,
            $resultDataBaseSet,
            [$durationString, $distanceString, 'road_type']
        );
        $arrayRoutes = json_decode(json_encode($routes), true);
        asort($arrayRoutes);
        $route1 = array_slice($arrayRoutes, 1, 3, true);
        $route2 = array_slice($arrayRoutes, 4, 3, true);
        $route3 = array_slice($arrayRoutes, 7, 3, true);
        $routesInformation1 = $this->generateRoutes(
            $resultDataBaseSet,
            $route1
        );
        $routesInformation2 = $this->generateRoutes(
            $resultDataBaseSet,
            $route2
        );
        $routesInformation3 = $this->generateRoutes(
            $resultDataBaseSet,
            $route3
        );
        $allRoutes['route0'] = $routesInformation1;
        $allRoutes['route1'] =  $routesInformation2;
        $allRoutes['route2'] = $routesInformation3;
        echo  json_encode($allRoutes);
    }

    public function generateRoutes($dataSetDataBase, $routesId)
    {
        $idsRoute = array_keys($routesId);
        $routesInformation = [];
        foreach ($dataSetDataBase as $result) {
            foreach ($idsRoute as $resultId) {
                if ($resultId == $result->id) {
                    array_push($routesInformation, $result);
                }
            }
        }
        return   $routesInformation;
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
    public function getRoute ()
    {                 
        $this->view->show("mapDetailRoute.php");
    }
}
