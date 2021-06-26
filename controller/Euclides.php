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
            if (!isset($routes[$values->id])){
                $routes[$values->id] = [];                
            }
            array_push($routes[$values->id],  $squareOfDifferencesSum);            
        }
        return $routes;
    }

    /**
     * @param string $labelName name of the label that will have the input 
     *                       where the result of the calculation is shown.  
     * @param string $calculatedResult name that will have the span label.
     * @return string $resultHTML the div of html that containt the information
     *                            that will showed in the view. 
     */
    public function createStringHTML($labelName, $calculatedResult)
    {
        $resultHTML = "";
        $resultHTML .= '<div class="col-sm">';
        $resultHTML .= '<label style="margin-right : 20px" '
            . 'class="labelLearningStyle" for="average">' . $labelName .
            '</label>';
        $resultHTML .= '<input type="text" id="campus" name="campus" '
            . 'readonly="true" value="' . $calculatedResult . '">';
        $resultHTML .= '</div>';

        return $resultHTML;
    }

    /**
     * Transforms the learning style type from string to numeric so that it can 
     * be used in calculation.
     * @param string $value name of learning style.
     * @return int  return the numerical value according to the learning name. 
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
     * Transforms the sex type from string to numeric so that it can 
     * be used in calculation.
     * @param int $value type of sex. 
     * @return int  return the numerical value according to the sex name. 
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
     * Transforms the sex type from string to numeric so that it can 
     * be used in calculation.
     * @param string $value type of sex. 
     * @return int  return the numerical value according to the sex name. 
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

    public function changeHotelValue($value)
    {
        if ($value == 'Mountain') {
            return 1;
        } else if ($value == 'Beach') {
            return 2;
        }
        return 3;
    }
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
     * Transforms the learning style type from string to numeric so that it can 
     * be used in calculation.
     * @param string $value name of learning style.
     * @return int  return the numerical value according to the learning name. 
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
     * Transforms the learning style type from string to numeric so that it can 
     * be used in calculation.
     * @param string $value name of learning style.
     * @return int  return the numerical value according to the learning name. 
     */
    public function changeAgeRangeValue($value)
    {
        if ($value <= 17) {
            return 1;
        } else if ($value > 17 && $value <= 29) {
            return 2;
        }else if ($value > 29 && $value <= 49) {
            return 3;
        }
        return 4;
    }
    /**
     * Transforms the campus from string to numeric so that it can 
     * be used in calculation.
     * @param string $value name of campus. 
     * @return int  return the numerical value according to the campus name. 
     */
    public function changeCampusValue($value)
    {
        if ($value == 'Paraiso') {
            return 1;
        }
        return 2;
    }

    /**
     * Transforms the type of sex from string to numeric so that it can 
     * be used in calculation.
     * @param string $value type of sex. 
     * @return int  return the numerical value according to the sex name. 
     */

    public function changeTypeB($value)
    {
        if ($value == 'F') {
            return 1;
        } else if ($value == 'M') {
            return 2;
        }
        return 3;
    }


    /**
     * Transforms the type of experience teaching from string to numeric so 
     * that it can be used in calculation.
     * @param string $value name of experience teaching. 
     * @return int  return the numerical value according to the experience 
     *                  teaching name. 
     */
    public function changeTypeC($value)
    {
        if ($value == 'B') {
            return 1;
        } else if ($value == 'I') {
            return 2;
        }
        return 3;
    }

    /**
     * Transforms the type of area experience from string to numeric so that it 
     * can be used in calculation.
     * @param string $value name of area experience.
     * @return int  return the numerical value according to the area experience 
     *                  name. 
     */

    public function changeTypeE($value)
    {
        if ($value == 'DM') {
            return 1;
        } else if ($value == 'ND') {
            return 2;
        }
        return 3;
    }

    /**
     * Transforms the type of skills using computer from string to numeric so 
     * that it can be used in calculation.
     * @param string $value name of skills using computer.
     * @return int  return the numerical value according to the skills using 
     *                  computer name.
     */

    public function changeTypeF($value)
    {
        if ($value == 'L') {
            return 1;
        } else if ($value == 'A') {
            return 2;
        }
        return 3;
    }

    /**
     * Transforms the type of teacher’s experience using Web-based technology 
     * from string to numeric so that it can be used in calculation.
     * @param string $value name of teacher’s experience using Web-based 
     *                  technology.
     * @return int  return the numerical value according to the teacher’s 
     *                  experience using Web-based technology name.
     */

    public function changeTypeG($value)
    {
        if ($value == 'N') {
            return 1;
        } else if ($value == 'S') {
            return 2;
        }
        return 3;
    }

    /**
     * Transforms the type of teacher’s experience using a Web site from string 
     * to numeric so that it can be used in calculation.
     * @param string $value name of teacher’s experience using a Web site.
     * @return int  return the numerical value according to the teacher’s 
     *                  experience using a Web site name. 
     */

    public function changeTypeH($value)
    {
        if ($value == 'N') {
            return 1;
        } else if ($value == 'S') {
            return 2;
        }
        return 3;
    }

    /**
     * Transforms the type of cost and capacity level from string to numeric so 
     * that it can be used in calculation.
     * @param string $value name of cost and capacity level 
     * @return int  return the numerical value according to the cost and 
     *                  capacity level name. 
     */

    public function changeCapacityAndCostValue($value)
    {
        if ($value == 'Low') {
            return 1;
        } else if ($value == 'Medium') {
            return 2;
        }
        return 3;
    }
}
