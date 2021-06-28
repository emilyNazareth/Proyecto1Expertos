<?php

class ServiceEstablishmentsModel {

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

    public function getServiceEstablisments($initialDestination, $finalDestination) {
        $consulta = $this->db->prepare("call sp_get_all_service_establishments_by_province('".$initialDestination. "', '".$finalDestination."')");
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);
        $consulta->closeCursor();
        return $resultado;
    }

    

}
?>

