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
        /* Get routes acoording to origin province anda final province*/
        $resultDataBaseSet =
            $hotels->getHotels(
                $_POST['startingPoint'],
                $_POST['finalDestination']
            );
        /* Get data selected to user*/
        $dataUserSelected['origin_province'] = $_POST['startingPoint'];
        $dataUserSelected['final_province'] = $_POST['finalDestination'];
        $dataUserSelected['duration_to_' . $_POST['startingPoint']] =
            $_POST['duration'];
        $dataUserSelected['distance_to_' . $_POST['startingPoint']] =
            $_POST['distance'];
        $dataUserSelected['road_type'] = $_POST['typeOfRoad'];

        $durationString = strval("duration_to_" . $_POST['startingPoint']);
        $distanceString = strval("distance_to_" . $_POST['startingPoint']);
        /*change data values in order to use in euclides algorithm */
        foreach ($resultDataBaseSet as &$resultDb) {
            $resultDb->road_type =
                $euclidesAlgorithm->changeRoadTypeValue($resultDb->road_type);
            $resultDb->$durationString =
                $euclidesAlgorithm->changeDurationValue($resultDb->$durationString);
            $resultDb->$distanceString =
                $euclidesAlgorithm->changeKmValue($resultDb->$distanceString);
        }
        /*call method to calculate euclides*/
        $routes = $euclidesAlgorithm->calculateDistance(
            $dataUserSelected,
            $resultDataBaseSet,
            [$durationString, $distanceString, 'road_type']
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



    /**
     * Show Type Of Road view
     */

    public function showTypeOfRoadView()
    {
        $this->view->show("typeOfRoadView.php", null);
    }

    public function getRoute()
    {
        $this->view->show("mapDetailRoute.php");
    }
}
