<?php
class sellerController implements interfaceController{
    private $dao;
    
    public function __construct () {
        $this->dao = new sellerDAO();
    }
    
    public function index () {
        $seller = $this->dao->fetchAll();
        include('../public/seller/list.php');
    }
    
    public function show ($id) {
        $seller = $this->dao->fetch("Vendeur_ID", $id);
        include('../public/seller/one.php');
    }
    
    public function create () {
        include('../public/seller/form.php');
    }
    
    public function insert($data) {
        $this->dao->insert($data);
    }

    public function update($id) {
        $seller = $this->dao->fetch("Vendeur_ID", $id);
        include('../public/seller/form.php');

    }
}
?>