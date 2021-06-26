<?php

class RestaurantModel {

    protected $db;
    private static $instance = null;

    // constructor
    private function __construct() {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public static function singleton() {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getRestaurants($initialDestination, $finalDestination) {
        $consulta = $this->db->prepare("call sp_get_all_restaurants('".$initialDestination. "', '".$finalDestination."')");
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);
        $consulta->closeCursor();
        return $resultado;
    }

    

}
?>

