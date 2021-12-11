<?php
class sellerController implements interfaceController{
    private $dao;
    
    public function __construct () {
        $this->dao = new sellerDAO();
    }
    
    public function index () {
        $cars = $this->dao->fetchAll();
        include('../views/cars/list.php');
    }
    
    public function show ($id) {
        $car = $this->dao->fetch("Vendeur_ID", $id);
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