<?php

class ServiceEstablishmentsModel
{

    protected $db;
    private static $instance = null;

    // constructor
    private function __construct()
    {
        require 'libs/SPDO.php';
        $this->db = SPDO::singleton();
    }

    public static function singleton()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getServiceEstablisments($initialDestination, $finalDestination)
    {
        $consulta = $this->db->prepare("call sp_get_all_service_establishments_by_province('" . $initialDestination . "', '" . $finalDestination . "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);
        $consulta->closeCursor();
        return $resultado;
    }

    public function get_frequency(
        $col_attribute_name_,
        $col_class_name_,
        $table_name_
    ) {
        $consulta = $this->db->prepare("call sp_get_frequency_by_attribute(" .
            "'" . $col_attribute_name_ . "' , '" .  $col_class_name_ .  "' , '" .
            $table_name_ .  "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);
        $consulta->closeCursor();
        return $resultado;
    }

    public function save_frequencies_services(
        $attribute_name,
        $value_attribute,
        $frequency_nc,
        $class,
        $initialProbability
    ) {
        $consulta = $this->db->prepare("call sp_save_frequencies_services('"
            . $attribute_name .
            "','" . $value_attribute . "'," . $frequency_nc . "," .
            "'" . $class . "'," . $initialProbability . ")");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
    public function get_frequencies_by_table(
        $table_name,
        $attribute_name,
        $class,
        $class_name
    ) {
        $consulta = $this->db->prepare("call sp_get_frequencies_by_table('"
            . $table_name . "','" .  $attribute_name . "','" .   $class . "','"
            . $class_name  . "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function update_probability(
        $probability,
        $id_attribute,
        $table_name
    ) {
        $consulta = $this->db->prepare("call sp_update_probability("
            . $probability . "," .  $id_attribute . ",'" . $table_name . "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }

    public function get_probability(
        $attribute_name,
        $value_attribute,
        $table_name

    ) {
        $consulta = $this->db->prepare("call sp_get_probability('"
            . $attribute_name . "','" .  $value_attribute . "','" .  $table_name
            . "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
    public function getServiceEstablismentsByPrice($price) {
        $consulta = $this->db->prepare("call sp_get_service_by_price('"
            . $price . "')");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        $consulta->closeCursor();
        return $resultado;
    }
    
}
