<?php

class ServiceEstablishmentsController
{

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * Show Service Establishments view
     */

    public function showServiceEstablishments()
    {
        $this->view->show("serviceEstablishmentsView.php", null);
    }

    /**
     * Get route by Service Establishments preferenses
     */
    public function getRoutesByServiceEstablishments()
    {

        require 'model/ServiceEstablishmentsModel.php';

        $serviceEstablishments = ServiceEstablishmentsModel::singleton();

        // $this->trainningBayes($serviceEstablishments);
        /*Get the probability  for origin_province to all classes according to user input 
        data of the database */
        $probabilitiesByClassInOriginProvince = $serviceEstablishments->get_probability(
            'origin_province',
            $_POST['startingPoint'],
            'frequencies_services'
        );
        /*Get the probability  for road type to all classes according to user input 
        data of the database */
        $probabilitiesByClassInRoadType = $serviceEstablishments->get_probability(
            'road_type',
            $_POST['road_type'],
            'frequencies_services'
        );

        /*Do the multiplication of attribute probabilities for class cheap*/
        $totalProbabilitiesClassCheap = ($probabilitiesByClassInOriginProvince[0][0]
            * $probabilitiesByClassInRoadType[0][0]) * (13 / 21);
        /*Do the multiplication of attribute probabilities for class regular*/
        $totalProbabilitiesClassExpensive = ($probabilitiesByClassInOriginProvince[1][0]
            * $probabilitiesByClassInRoadType[1][0]) * (9 / 21);
        /*Do the multiplication of attribute probabilities for class expensive*/
        $totalProbabilitiesClassRegular = ($probabilitiesByClassInOriginProvince[2][0]
            * $probabilitiesByClassInRoadType[2][0]) * (13 / 21);
        $maxProbability = max(
            $totalProbabilitiesClassCheap,
            $totalProbabilitiesClassExpensive,
            $totalProbabilitiesClassRegular
        );
        $nameClassMax;
        if ($maxProbability == $totalProbabilitiesClassCheap) {
            $nameClassMax = "cheap";
        } else if ($maxProbability == $totalProbabilitiesClassExpensive) {
            $nameClassMax = "expensive";
        } else {
            $nameClassMax = "regular";
        }
        $routesInfo =
            $serviceEstablishments->getServiceEstablismentsByPrice($nameClassMax);

        /*create three routes using the differences where the ones with the 
        smallest difference will be the most recommended*/
        $route1 = array_slice($routesInfo, 0, 3, true);
        $route2 = array_slice($routesInfo, 3, 3, true);
        $route3 = array_slice($routesInfo, 6, 3, true);

        $allRoutes['route0'] = $route1;
        $allRoutes['route1'] =  $route2;
        $allRoutes['route2'] = $route3;
        echo  json_encode($allRoutes);
    }



    public function trainningBayes($serviceEstablishments)
    {

        /*get frequencies to each attribute*/
        /*Get frequencies to origin province in class price regular, cheap and
          expensive*/
        $resultCalculatingServicesFrequencies['origin_province'] =
            $serviceEstablishments->get_frequency(
                'origin_province',
                'precio',
                'service_test'
            );
        /*Get frequencies to road type in class price regular, cheap and
        expensive*/
        $resultCalculatingServicesFrequencies['road_type'] =
            $serviceEstablishments->get_frequency(
                'road_type',
                'precio',
                'service_test'
            );

        /*save frequencies in data base to origin province attribute*/
        // $this->saveFrequencies(
        //     $resultCalculatingServicesFrequencies,
        //     'origin_province',
        //     $serviceEstablishments,
        //     'frequencies_services'
        // );
        /*save frequencies in data base to road type attribute*/
        // $this->saveFrequencies(
        //     $resultCalculatingServicesFrequencies,
        //     'road_type',
        //     $serviceEstablishments,
        //     'frequencies_services'
        // );

        //get all frequencies to attribute origin_province in class cheap
        $frequenciesServicesOriginProvinceCheap = $serviceEstablishments->get_frequencies_by_table(
            'frequencies_services',
            'origin_province',
            'cheap',
            'class'
        );
        // //calculate the probabilities to attribute origin_province in class cheap
        $this->calculateProbabilityByAttribute(
            $frequenciesServicesOriginProvinceCheap,
            13,
            $serviceEstablishments,
            2,
            'frequencies_services'
        );
        // //get all frequencies to attribute origin_province in class regular
        $frequenciesServicesOriginProvinceRegular = $serviceEstablishments->get_frequencies_by_table(
            'frequencies_services',
            'origin_province',
            'regular',
            'class'
        );
        // //calculate the probabilities to attribute origin_province in class regular
        $this->calculateProbabilityByAttribute(
            $frequenciesServicesOriginProvinceRegular,
            15,
            $serviceEstablishments,
            2,
            'frequencies_services'
        );

        // //get all frequencies to attribute origin_province  in class expensive
        $frequenciesServicesOriginProvinceExpensive = $serviceEstablishments->get_frequencies_by_table(
            'frequencies_services',
            'origin_province',
            'expensive',
            'class'
        );

        // //calculate the probabilities to attribute origin_province in class expensive
        $this->calculateProbabilityByAttribute(
            $frequenciesServicesOriginProvinceExpensive,
            9,
            $serviceEstablishments,
            2,
            'frequencies_services'
        );


        // //get all frequencies to attribute road type in class cheap
        $frequenciesServicesRoadCheap = $serviceEstablishments->get_frequencies_by_table(
            'frequencies_services',
            'road_type',
            'cheap',
            'class'
        );
        //calculate the probabilities to attribute  road type in class cheap
        $this->calculateProbabilityByAttribute(
            $frequenciesServicesRoadCheap,
            13,
            $serviceEstablishments,
            2,
            'frequencies_services'
        );
        //get all frequencies to attribute  road type in class regular
        $frequenciesServicesRoadRegular = $serviceEstablishments->get_frequencies_by_table(
            'frequencies_services',
            'road_type',
            'regular',
            'class'
        );
        // //calculate the probabilities to attribute  road type in class regular
        $this->calculateProbabilityByAttribute(
            $frequenciesServicesRoadRegular,
            15,
            $serviceEstablishments,
            2,
            'frequencies_services'
        );

        // //get all frequencies to attribute  road type in class expensive
        $frequenciesServicesRoadExpensive = $serviceEstablishments->get_frequencies_by_table(
            'frequencies_services',
            'road_type',
            'expensive',
            'class'
        );

        //calculate the probabilities to attribute  road type in class expensive
        $this->calculateProbabilityByAttribute(
            $frequenciesServicesRoadExpensive,
            9,
            $serviceEstablishments,
            2,
            'frequencies_services'
        );
    }
    public function generateRoutes($dataSetDataBase, $routesId)
    {
        $idsRoute = array_keys($routesId);
        $routesInformation = [];
        foreach ($dataSetDataBase as $result) {
            foreach ($idsRoute as $resultId) {
                if ($resultId == $result['id']) {
                    array_push($routesInformation, $result);
                }
            }
        }
        return   $routesInformation;
    }
    /**
     * Get Service Establishments 
     */

    public function saveFrequencies(
        $arrayByAttribute,
        $attributeName,
        $dataSetModel,
        $tableName
    ) {
        /*variable that contain the name of method to execute to save frequencies
        in data base*/
        $methodToInvoque = "";
        $nameClass = "";
        switch ($tableName) {
            case 'frequencies_services':
                $methodToInvoque = 'save_frequencies_services';
                $nameClass = 'precio';
                break;
        }

        //insert in database all frequencies by attribute
        foreach ($arrayByAttribute[$attributeName] as $frequencies) {
            $dataSetModel->$methodToInvoque(
                $attributeName,
                $frequencies->$attributeName,
                $frequencies->frequency_nc,
                $frequencies->$nameClass,
                0
            );
        }
    }

    public function calculateProbabilityByAttribute(
        $arrayByAttribute,
        $n,
        $dataSetModel,
        $m,
        $table_name
    ) {


        foreach ($arrayByAttribute as $frequencies) {
            /*get the p where arrayByAttribute contain all diferents values
            that attribute can have*/
            $p = 1 / (count($arrayByAttribute));
            $probability =  ($frequencies['frequency_nc'] + ($m * $p)) / ($n + $m);
            //save the probability of each value of attribute
            $this->saveProbability($probability, $frequencies['id'], $dataSetModel, $table_name);
        }
    }


    /**
     * Save all probabilities to each attribute
     * @param array $probability value of probability. 
     * @param string $id_attribute id of attribute.
     * @param object $dataSetModel constructor singleton.
     * @param string $table_name name of table where the probabilities will be saved.
     *  
     */
    public function saveProbability(
        $probability,
        $id_attribute,
        $dataSetModel,
        $table_name
    ) {
        $dataSetModel->update_probability($probability, $id_attribute, $table_name);
    }

    public function showServiceView()
    {
        $this->view->show("mapDetailRoute.php");
    }

    public function getRoute()
    {
        $this->view->show("mapDetailRoute.php");
    }
}
