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
        $allRoutes = [];
        require 'model/ActivityModel.php';
        require 'controller/Euclides.php';

        $euclidesAlgorithm = new Euclides();
        $activities = ActivityModel::singleton();
        $resultDataBaseSet = $activities->getActivities($_POST['startingPoint'], $_POST['finalDestination']);
        $dataUserSelected['origin_province'] = $_POST['startingPoint'];
        $dataUserSelected['final_province'] = $_POST['finalDestination'];
        $dataUserSelected['duration_to_' . $_POST['startingPoint']] = $_POST['duration'];
        $dataUserSelected['distance_to_' . $_POST['startingPoint']] = $_POST['distance'];
        $dataUserSelected['price'] = $_POST['price'];
        $dataUserSelected['tourist'] = $_POST['activityType'];
        $durationString = strval("duration_to_" . $_POST['startingPoint']);
        $distanceString = strval("distance_to_" . $_POST['startingPoint']);
        $tourist = 'tourist';
        foreach ($resultDataBaseSet as &$resultDb) {
            $resultDb->price = $euclidesAlgorithm->changePriceValue($resultDb->price);
            $resultDb->$durationString = $euclidesAlgorithm->changeDurationValue($resultDb->$durationString);
            $resultDb->$distanceString = $euclidesAlgorithm->changeKmValue($resultDb->$distanceString);
            $resultDb->$tourist = $euclidesAlgorithm->changeActivityType($resultDb->$distanceString);
        }

        $routes = $euclidesAlgorithm->calculateDistance(
            $dataUserSelected,
            $resultDataBaseSet,
            [$durationString, $distanceString, 'price', 'tourist']
        );
        $arrayRoutes = json_decode(json_encode($routes), true);
        asort($arrayRoutes);
        $route1 = array_slice($arrayRoutes, 1, 4, true);
        $route2 = array_slice($arrayRoutes, 5, 4, true);
        $route3 = array_slice($arrayRoutes, 9, 5, true);
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
       // echo "Buscando Hotel";
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

    public function getRoute ()
    {                 
        $this->view->show("mapDetailRoute.php");
    }
}