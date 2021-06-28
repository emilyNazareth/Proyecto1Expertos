<?php

class RestaurantController
{

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Show the view restaurant
     */

    public function showRestaurantView()
    {
        $this->view->show("restaurantView.php", null);
    }

    /**
     * Get route by Restaurant preferenses
     */
    public function getRoutesByRestaurant()
    {
        $allRoutes = [];
        require 'model/RestaurantModel.php';
        require 'controller/Euclides.php';
        $euclidesAlgorithm = new Euclides();
        $restaurants = RestaurantModel::singleton();
        /* Get routes acoording to origin province anda final province*/
        $resultDataBaseSet =
            $restaurants->getRestaurants(
                $_POST['initialDestination'],
                $_POST['finalDestination']
            );
        /* Get data selected to user*/
        $dataUserSelected['origin_province'] = $_POST['initialDestination'];
        $dataUserSelected['final_province'] = $_POST['finalDestination'];
        $dataUserSelected['duration_to_' . $_POST['initialDestination']] =
            $_POST['duration'];
        $dataUserSelected['distance_to_' . $_POST['initialDestination']] =
            $_POST['distance'];
        $dataUserSelected['price'] = $_POST['price'];
        $dataUserSelected['close_time'] = $_POST['closingTime'];
        $durationString = strval("duration_to_" . $_POST['initialDestination']);
        $distanceString = strval("distance_to_" . $_POST['initialDestination']);
        /*change data values in order to use in euclides algorithm */
        foreach ($resultDataBaseSet as &$resultDb) {
            $resultDb->price =
                $euclidesAlgorithm->changePriceValue($resultDb->price);
            $resultDb->$durationString =
                $euclidesAlgorithm->changeDurationValue($resultDb->$durationString);
            $resultDb->$distanceString =
                $euclidesAlgorithm->changeKmValue($resultDb->$distanceString);
        }
        /*call method to calculate euclides*/
        $routes = $euclidesAlgorithm->calculateDistance(
            $dataUserSelected,
            $resultDataBaseSet,
            [$durationString, $distanceString, 'price', 'close_time']
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



    public function showRestaurantRouteView()
    {
        $this->view->show("mapDetailRoute.php");
    }
}
