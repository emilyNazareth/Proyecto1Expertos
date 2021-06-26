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
     * Get route by Tourist preferenses
     */
    public function getRoutesByTourist()
    {
        $allRoutes = [];
        require 'model/TouristModel.php';
        require 'controller/Euclides.php';
        $euclidesAlgorithm = new Euclides();
        $tourist = TouristModel::singleton();
        $resultDataBaseSet = $tourist->getActivities($_POST['startingPoint'], $_POST['finalDestination']);
        $dataUserSelected['origin_province'] = $_POST['startingPoint'];
        $dataUserSelected['final_province'] = $_POST['finalDestination'];
        $dataUserSelected['origin_province'] = $_POST['startingPoint'];
        $dataUserSelected['tourist'] = $_POST['typeTourist'];
        $dataUserSelected['ageRange'] = $_POST['ageRange'];
        $dataUserSelected['duration_to_' . $_POST['startingPoint']] = $_POST['duration'];
        $dataUserSelected['distance_to_' . $_POST['startingPoint']] = $_POST['distance'];
        $durationString = strval("duration_to_" . $_POST['startingPoint']);
        $distanceString = strval("distance_to_" . $_POST['startingPoint']);
        foreach ($resultDataBaseSet as &$resultDb) {
            $resultDb->tourist = $euclidesAlgorithm->changeTouristValue($resultDb->tourist);
            $resultDb->$durationString = $euclidesAlgorithm->changeDurationValue($resultDb->$durationString);
            $resultDb->$distanceString = $euclidesAlgorithm->changeKmValue($resultDb->$distanceString);
            $resultDb->ageRange = $euclidesAlgorithm->changeAgeRangeValue($resultDb->ageRange);
        }

        $routes = $euclidesAlgorithm->calculateDistance(
            $dataUserSelected,
            $resultDataBaseSet,
            [$durationString, $distanceString, 'tourist', 'ageRange']
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
    public function showTouristRouteView ()
    {                 
        $this->view->show("mapDetailRoute.php");
    }

}
