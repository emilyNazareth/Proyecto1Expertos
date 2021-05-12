<?php

class DataSetModel {

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

    public function getStyleCampus() {
        $consulta = $this->db->prepare("call sp_get_all_styles_campus()");
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);
        $consulta->closeCursor();
        return $resultado;
    }

    public function getStyleSexGradePointAverageCampus() {
        $consulta = $this->db->prepare("call sp_get_all_styles_sex_gpa_campus()");
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);
        $consulta->closeCursor();
        return $resultado;
    }

    public function getTeachers() {
        $consulta = $this->db->prepare("call sp_get_all_teachers()");
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);
        $consulta->closeCursor();
        return $resultado;
    }

    public function getNetworks() {
        $consulta = $this->db->prepare("call sp_get_all_networks()");
        $consulta->execute();
        $resultado = $consulta->fetchAll(PDO::FETCH_OBJ);
        $consulta->closeCursor();
        return $resultado;
    }

}
?>

