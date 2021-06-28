<?php

class RecommendedSiteController {

    public function __construct() {
        $this->view = new View();
    }

    /**
     * Show Recommended Site view
     */
    public function showRecommendedSiteView() {
        $this->view->show("recommendedSiteView.php", null);
    }

    /**
     * Get Recommended Site
     */
    public function getRecommendedSite() {
        $allRoutes = [];
        require 'model/TouristModel.php';
        require 'controller/Euclides.php';
        $euclidesAlgorithm = new Euclides();
        $tourist = TouristModel::singleton();
        $resultDataBaseSet = $tourist->getActivities($_POST['startingPoint'], $_POST['finalDestination']);
        $dataUserSelected['origin_province'] = $_POST['startingPoint'];
        $dataUserSelected['final_province'] = $_POST['finalDestination'];
        $dataUserSelected['origin_province'] = $_POST['startingPoint'];
        $dataUserSelected['duration_to_' . $_POST['startingPoint']] = $_POST['duration'];
        $dataUserSelected['distance_to_' . $_POST['startingPoint']] = $_POST['distance'];
        $durationString = strval("duration_to_" . $_POST['startingPoint']);
        $distanceString = strval("distance_to_" . $_POST['startingPoint']);
        foreach ($resultDataBaseSet as &$resultDb) {
            $resultDb->$durationString = $euclidesAlgorithm->changeDurationValue($resultDb->$durationString);
            $resultDb->$distanceString = $euclidesAlgorithm->changeKmValue($resultDb->$distanceString);
        }

        $routes = $euclidesAlgorithm->calculateDistance(
                $dataUserSelected, $resultDataBaseSet, [$durationString, $distanceString]
        );
        $arrayRoutes = json_decode(json_encode($routes), true);
        asort($arrayRoutes);
        $route1 = array_slice($arrayRoutes, 1, 3, true);
        $route2 = array_slice($arrayRoutes, 4, 3, true);
        $route3 = array_slice($arrayRoutes, 7, 3, true);
        $routesInformation1 = $this->generateRoutes(
                $resultDataBaseSet, $route1
        );
        $routesInformation2 = $this->generateRoutes(
                $resultDataBaseSet, $route2
        );
        $routesInformation3 = $this->generateRoutes(
                $resultDataBaseSet, $route3
        );
        $allRoutes['route0'] = $routesInformation1;
        $allRoutes['route1'] = $routesInformation2;
        $allRoutes['route2'] = $routesInformation3;
        echo json_encode($allRoutes);
    }

    public function generateRoutes($dataSetDataBase, $routesId) {
        $idsRoute = array_keys($routesId);
        $routesInformation = [];
        foreach ($dataSetDataBase as $result) {
            foreach ($idsRoute as $resultId) {
                if ($resultId == $result->id) {
                    array_push($routesInformation, $result);
                }
            }
        }
        return $routesInformation;
    }

    public function showSiteAddress() {
        $id = $_GET['id'];
        $maps = array(
            'iframe'
        );
        if ($id == "Cerro Chirripó") {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d152656.3923337684!2d-83.55846652862027!3d9.508065621272658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa14ac81e02a64f%3A0x62c0b48bcbb5004c!2sParque%20Nacional%20Chirrip%C3%B3!5e0!3m2!1ses!2scr!4v1621447410426!5m2!1ses!2scr' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'";
        } else if ($id == "Parque Nacional Marino Ballena") {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58355.67947626879!2d-83.7397899083405!3d9.134014072288167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa15775aed4ed85%3A0xf6425ef4076a9af9!2sParque%20Nacional%20Marino%20Ballena!5e0!3m2!1ses!2scr!4v1621447620840!5m2!1ses!2scr' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'";
        } else {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d345730.3266103428!2d-83.12734342344434!3d9.787525623915556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa6450b49c2b87b%3A0x6acf597bc31a9bf!2sRefugio%20Nacional%20Gandoca-Manzanillo!5e0!3m2!1ses!2scr!4v1621447753613!5m2!1ses!2scr' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'";
        }

        $this->view->show("addressSiteView.php", $maps);
    }

    public function getRoute() {
        $this->view->show("mapDetailRoute.php");
    }

}
