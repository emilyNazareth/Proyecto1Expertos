<?php

class HotelController
{

    public function __construct()
    {
        $this->view = new View();
    }



    /**
     * Shorw hotel view
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
        $allRoutes = [];
        require 'model/HotelModel.php';
        require 'controller/Euclides.php';
        $euclidesAlgorithm = new Euclides();
        $hotels = HotelModel::singleton();
        /* Get routes acoording to origin province anda final province*/
        $resultDataBaseSet = $hotels->getHotels(
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
        $dataUserSelected['price'] = $_POST['hotelPrice'];
        $dataUserSelected['hotel_type'] = $_POST['hotelType'];
        $durationString = strval("duration_to_" . $_POST['startingPoint']);
        $distanceString = strval("distance_to_" . $_POST['startingPoint']);
        /*change data values in order to use in euclides algorithm */
        foreach ($resultDataBaseSet as &$resultDb) {
            $resultDb->price =
                $euclidesAlgorithm->changePriceValue($resultDb->price);
            $resultDb->$durationString =
                $euclidesAlgorithm->changeDurationValue($resultDb->$durationString);
            $resultDb->$distanceString =
                $euclidesAlgorithm->changeKmValue($resultDb->$distanceString);
            $resultDb->hotel_type =
                $euclidesAlgorithm->changeHotelValue($resultDb->hotel_type);
        }
        /*call method to calculate euclides*/
        $routes = $euclidesAlgorithm->calculateDistance(
            $dataUserSelected,
            $resultDataBaseSet,
            [$durationString, $distanceString, 'price', 'hotel_type']
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

  

    public function showHotelRouteView()
    {
        $this->view->show("mapDetailRoute.php");
    }
}
