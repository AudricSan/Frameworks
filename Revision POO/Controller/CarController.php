<?php
class CarController implements interfaceController{
    private $dao;
    
    public function __construct () {
        $this->dao = new carDAO();
    }
    
    public function index () {
        $cars = $this->dao->fetchAll();
        include('../views/cars/list.php');
    }
    
    public function show ($id) {
        $car = $this->dao->fetch("Voiture_ID", $id);
        include('../views/cars/one.php');
    }
    
    public function create () {
        include('../views/cars/form.php');
    }
    
    public function insert($data) {
        $this->dao->insert($data);
    }
}
?>