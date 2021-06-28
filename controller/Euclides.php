<?php

/**
 * Class created to do all calculates of distance differences using 
 * euclides algorithm
 */
class Euclides
{

    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * gets the shortest distance between $dataUserSelected and  $dataDataBase. 
     * @param array $dataUserSelected data entered by the user. 
     * @param array $dataDataBase data obtained from the database(dataSet).
     * @param array $differencesToEvaluate data with the name of all columns
     *                  that will be used to compare in the database.
     * @return object $resultTuple the tuple where the difference is smaller.        
     */
    public function calculateDistance(
        $dataUserSelected,
        $dataDataBase,
        $differencesToEvaluate
    ) {
        $routes = [];
        $routes['differences'] = [];
        $shorterDistanceValue = 30000;

        /**
         * get the data from the database one by one.
         */
        foreach ($dataDataBase as $values) {
            $differencesSumValue = 0;
            /**
             * get the data from the database one by one where the colum name
             * is equal to $differencesToEvaluate.
             */
            foreach ($differencesToEvaluate as $column) {
                /**
                 *sum of powers of difference subtraction.
                 */
                $differencesSumValue += pow(($dataUserSelected[$column] -
                    $values->$column), 2);
            }
            /**
             *calculation of the square root of the sum of powers of difference 
             *subtraction.
             */
            $squareOfDifferencesSum = sqrt($differencesSumValue);
            if (!isset($routes[$values->id])) {
                $routes[$values->id] = [];
            }
            array_push($routes[$values->id],  $squareOfDifferencesSum);
        }
        return $routes;
    }

    
    /**
     * search the route by id in order get all information about it and 
     *   save in array. 
     * @param array $dataDataBase data obtained from the database(dataSet).
     * @param array $routesId of each place
     * @return object $routesInformation array with routes created.        
     */
    
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

    /**
     * Transforms the price type from string to numeric so that it can 
     * be used in calculation.
     * @param string $value name of price.
     * @return int  return the numerical value according to the price name. 
     */
    public function changePriceValue($value)
    {
        if ($value == 'cheap') {
            return 1;
        } else if ($value == 'regular') {
            return 2;
        }
        return 3;
    }

    /**
     * Transforms the distance range  so that it can 
     * be used in calculation.
     * @param string $value type of distance. 
     * @return int  return the numerical value according to the distance range. 
     */
    public function changeKmValue($value)
    {
        if ($value < 25) {
            return 1;
        } else if ($value > 25 && $value < 50) {
            return 2;
        }
        return 3;
    }
    /**
     * Transforms the duration type from string to numeric so that it can 
     * be used in calculation.
     * @param string $value type of duration. 
     * @return int  return the numerical value according to the duration range. 
     */
    public function changeDurationValue($value)
    {
        if ($value < 60) {
            return 1;
        } else if ($value > 60 && $value < 120) {
            return 2;
        }
        return 3;
    }

    /**
     * Transforms the province  type from string to numeric so that it can 
     * be used in calculation.
     * @param string $value name of province.
     * @return int  return the numerical value according to the province name. 
     */
    public function changeProvinceValue($value)
    {
        if ($value == 'Cartago') {
            return 1;
        } else if ($value == 'Heredia') {
            return 2;
        } else if ($value == 'San Jose') {
            return 3;
        }
        return 4;
    }
    /**
     * Transforms the hotel  type from string to numeric so that it can 
     * be used in calculation.
     * @param string $value name of hotel.
     * @return int  return the numerical value according to the hotel name. 
     */
    public function changeHotelValue($value)
    {
        if ($value == 'Mountain') {
            return 1;
        } else if ($value == 'Beach') {
            return 2;
        }
        return 3;
    }

    /**
     * Transforms the road  type from string to numeric so that it can 
     * be used in calculation.
     * @param string $value name of road.
     * @return int  return the numerical value according to the road name. 
     */

    public function changeRoadTypeValue($value)
    {
        if ($value == 'Pavement') {
            return 1;
        } else if ($value == 'Stone') {
            return 2;
        }
        return 3;
    }

    /**
     * Transforms the tourist  type from string to numeric so that it can 
     * be used in calculation.
     * @param string $value name of tourist.
     * @return int  return the numerical value according to the tourist name. 
     */
    public function changeTouristValue($value)
    {
        if ($value == 'adventurous') {
            return 1;
        } else if ($value == 'reserved') {
            return 2;
        }
        return 3;
    }

    /**
     * Transforms the range age type from string to numeric so that it can 
     * be used in calculation.
     * @param string $value name of range age.
     * @return int  return the numerical value according to the age range. 
     */
    public function changeAgeRangeValue($value)
    {
        if ($value <= 17) {
            return 1;
        } else if ($value > 17 && $value <= 29) {
            return 2;
        } else if ($value > 29 && $value <= 49) {
            return 3;
        }
        return 4;
    }

    public function changeActivityType($value)
    {
        if ($value == 'adventurous') {
            return 1;
        } else if ($value == 'cultured') {
            return 2;
        }
        return 3;
    }
}
