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
        $resultDataBaseSet = $hotels->getHotels($_POST['startingPoint'], $_POST['finalDestination']);
        $dataUserSelected['origin_province'] = $_POST['startingPoint'];
        $dataUserSelected['final_province'] = $_POST['finalDestination'];
        $dataUserSelected['duration_to_' . $_POST['startingPoint']] = $_POST['duration'];
        $dataUserSelected['distance_to_' . $_POST['startingPoint']] = $_POST['distance'];
        $dataUserSelected['price'] = $_POST['hotelPrice'];
        $dataUserSelected['hotel_type'] = $_POST['hotelType'];
        $durationString = strval("duration_to_" . $_POST['startingPoint']);
        $distanceString = strval("distance_to_" . $_POST['startingPoint']);
        foreach ($resultDataBaseSet as &$resultDb) {
            $resultDb->price = $euclidesAlgorithm->changePriceValue($resultDb->price);
            $resultDb->$durationString = $euclidesAlgorithm->changeDurationValue($resultDb->$durationString);
            $resultDb->$distanceString = $euclidesAlgorithm->changeKmValue($resultDb->$distanceString);
            $resultDb->hotel_type = $euclidesAlgorithm->changeHotelValue($resultDb->hotel_type);
        }

        $routes = $euclidesAlgorithm->calculateDistance(
            $dataUserSelected,
            $resultDataBaseSet,
            [$durationString, $distanceString, 'price', 'hotel_type']
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
        if ($id == "Columbus") {
            $maps['iframe'] = "\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15719.786712391648!2d-84.1043112!3d9.9383948!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7ff100312c2c5bbc!2sHotel%20Columbus!5e0!3m2!1ses-419!2scr!4v1621452994876!5m2!1ses-419!2scr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"";
        } else if ($id == "ibza") {
            $maps['iframe'] = "\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15735.051931428452!2d-84.6299896!3d9.6156654!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1727a6d52574182f!2sHotel%20Ibiza!5e0!3m2!1ses-419!2scr!4v1621453174766!5m2!1ses-419!2scr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"";
        } else {
            $maps['iframe'] = "\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15716.712782731527!2d-84.195378!3d10.002135!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbc0686749c35c017!2sHampton%20Inn%20%26%20Suites%20by%20Hilton%20San%20Jose%20Airport%20Costa%20Rica!5e0!3m2!1ses-419!2scr!4v1621453255984!5m2!1ses-419!2scr\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"";
        }

        $this->view->show("addressSiteView.php", $maps);
    }
    public function getRoute()
    {
        $this->view->show("mapDetailRoute.php");
    }

    public function showHotelRouteView()
    {
        $this->view->show("mapDetailRoute.php");
    }
}
