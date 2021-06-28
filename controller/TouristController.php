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
        /* Get routes acoording to origin province anda final province*/
        $resultDataBaseSet =
            $tourist->getActivities(
                $_POST['startingPoint'],
                $_POST['finalDestination']
            );
        /* Get data selected to user*/
        $dataUserSelected['origin_province'] = $_POST['startingPoint'];
        $dataUserSelected['final_province'] = $_POST['finalDestination'];
        $dataUserSelected['origin_province'] = $_POST['startingPoint'];
        $dataUserSelected['tourist'] = $_POST['typeTourist'];
        $dataUserSelected['ageRange'] = $_POST['ageRange'];
        $dataUserSelected['duration_to_' . $_POST['startingPoint']] =
            $_POST['duration'];
        $dataUserSelected['distance_to_' . $_POST['startingPoint']] =
            $_POST['distance'];
        $durationString = strval("duration_to_" . $_POST['startingPoint']);
        $distanceString = strval("distance_to_" . $_POST['startingPoint']);
        /*change data values in order to use in euclides algorithm */
        foreach ($resultDataBaseSet as &$resultDb) {
            $resultDb->tourist =
                $euclidesAlgorithm->changeTouristValue($resultDb->tourist);
            $resultDb->$durationString =
                $euclidesAlgorithm->changeDurationValue($resultDb->$durationString);
            $resultDb->$distanceString =
                $euclidesAlgorithm->changeKmValue($resultDb->$distanceString);
            $resultDb->ageRange =
                $euclidesAlgorithm->changeAgeRangeValue($resultDb->ageRange);
        }
        /*call method to calculate euclides*/
        $routes = $euclidesAlgorithm->calculateDistance(
            $dataUserSelected,
            $resultDataBaseSet,
            [$durationString, $distanceString, 'tourist', 'ageRange']
        );
        $arrayRoutes = json_decode(json_encode($routes), true);
        /*order routes according differences values in ascending order*/
        asort($arrayRoutes);
        /*create three routes using the differences where the ones with the 
        smallest difference will be the most recommended*/
        $route1 = array_slice($arrayRoutes, 1, 3, true);
        $route2 = array_slice($arrayRoutes, 4, 3, true);
        $route3 = array_slice($arrayRoutes, 7, 3, true);
        $routesInformation1 = $euclidesAlgorithm->generateRoutes(
            $resultDataBaseSet,
            $route1
        );
        $routesInformation2 = $euclidesAlgorithm->generateRoutes(
            $resultDataBaseSet,
            $route2
        );
        $routesInformation3 = $euclidesAlgorithm->generateRoutes(
            $resultDataBaseSet,
            $route3
        );
        $allRoutes['route0'] = $routesInformation1;
        $allRoutes['route1'] =  $routesInformation2;
        $allRoutes['route2'] = $routesInformation3;
        echo  json_encode($allRoutes);
    }


    public function showTouristRouteView()
    {
        $this->view->show("mapDetailRoute.php");
    }
}
