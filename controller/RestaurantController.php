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


    public function getRoutesByRestaurant()
    {
        require 'model/RestaurantModel.php';
        require 'controller/Euclides.php';
        $euclidesAlgorithm = new Euclides();
        $restaurants = RestaurantModel::singleton();
        $resultDataBaseSet = $restaurants->getRestaurants($_POST['initialDestination'],$_POST['finalDestination']);
        $dataUserSelected['origin_province'] = $_POST['initialDestination'];
        $dataUserSelected['final_province'] = $_POST['finalDestination'];
        $dataUserSelected['duration_to_'.$_POST['initialDestination']] = $_POST['duration'];
        $dataUserSelected['distance_to_'.$_POST['initialDestination']] = $_POST['distance'];
        $dataUserSelected['price'] = $_POST['price'];        
        $dataUserSelected['close_time'] = $_POST['$closingTime'];
        print_r('duration_to_'.$_POST['initialDestination']);
        /*foreach ($resultDataBaseSet as &$resultDb) {
            $resultDb->price =
                $euclidesAlgorithm->changePriceValue($resultDb->price);
            $resultDb->'duration_to_'.$_POST['initialDestination']=
                $euclidesAlgorithm->changeDurationValue($resultDb->'duration_to_'.$_POST['initialDestination']);
                $resultDb->'distance_to_'.$_POST['initialDestination']=
                $euclidesAlgorithm->changeKmValue($resultDb->'distance_to_'.$_POST['initialDestination']);
            }
        
        $routes = $euclidesAlgorithm->calculateDistance(
            $dataUserSelected,
            $resultDataBaseSet,
            ['origin_province', 'final_province', 'duration_to_'.$_POST['initialDestination'],'distance_to_'.$_POST['initialDestination'], 'price','close_time']
        );
        echo $routes;*/
    }   

    public function showSiteAddress()
    {
        $id = $_GET['id'];
        $maps = array(
            'iframe'
        );
        if ($id == "Tukasa") {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3930.799259300616!2d-83.94412668500046!3d9.867202278013572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0dfe68706b7af%3A0xfbec888af13b9bee!2sTUKASA%20Caf%C3%A9%20Paseo%20Metr%C3%B3poli!5e0!3m2!1ses!2scr!4v1621371389862!5m2!1ses!2scr' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'";
        } else if ($id == "Silvestre") {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3929.9442927146056!2d-84.07846478500021!3d9.938593276814984!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0e361de6ffff9%3A0x59b3c91156a1ae1e!2sRestaurante%20Silvestre!5e0!3m2!1ses!2scr!4v1621372111394!5m2!1ses!2scr' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'";
        } else {
            $maps['iframe'] = "'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1965.1080687710182!2d-83.69244244127808!3d9.915949000000007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0d6bb8f45c923%3A0xa1009826a213798!2sR%C3%ADo%20Bar%20y%20Restaurante!5e0!3m2!1ses!2scr!4v1621372253242!5m2!1ses!2scr' width='600' height='450' style='border:0;' allowfullscreen='' loading='lazy'";
        }

        $this->view->show("addressSiteView.php", $maps);
    }
    public function getRoute()
    {
        //conect   with database and get restaurant with id =   $_POST['id']; 
        //send info of route to go that restaurant
        $route = array(
            'restaurantName' => "La Fabbrica",
            'lat' => 10.0160347003013,
            'lng' => -84.2079873580799,
        );
        echo  json_encode($route);
    }

    public function showRestaurantRouteView()
    {
        $this->view->show("mapDetailRoute.php");
    }
}
