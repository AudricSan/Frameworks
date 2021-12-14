<?php
class sellerDAO extends MasterDAO{

    // Change the values according to your hosting.
    private $username = "root";     //The login to connect to the DB
    private $password = "";         //The password to connect to the DB
    private $host = "localhost";    //The name of the server where my DB is located
    private $dbname = "poo review";    //The name of the DB you want to attack.

    //DON'T TOUCH IT, LITTLE PRICK
    private $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    public function __construct () {
        $this->table = "vendeur"; // The table to attack => YOU CAN EDIT THIS LINE

        $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password, $this->options);;
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function createObject ($result) {
        if(empty($result['Vendeur_ID'])){
            $result['Vendeur_ID'] = 0;
        }

        return new seller(
            $result['Vendeur_ID'],
            $result['Vendeur_Name'],
            $result['Vendeur_FirstName'],
            $result['Vendeur_Bday']
        );
    }

    public function insert ($data){
        if(empty($data['Vendeur_Name']) || empty($data['Vendeur_FisrtName']) || empty($data['Vendeur_Bday'])){
            return false;
        }

            $newSeller = $this->createObject($data);

            try {
                $statement = $this->connection->prepare("INSERT INTO vendeur (Vendeur_Name, Vendeur_FirstName, Vendeur_Bday) VALUES (?, ?, ?)");
                $statement->execute([$newSeller->name, $newSeller->firstName, $newSeller->bday]);
    
                $newSeller->ID = $this->connection->lastInsertID();
                return $newSeller;
            } catch (PDOException $e) {
                var_dump($e);
            }
    }

    public function update ($id, $data){
        if(empty($id) || empty($data['Vendeur_Name']) || empty($data['Vendeur_FirstName']) || empty($data['Vendeur_Bday'])){
            return false;
        }

        $check = $this->fetch("Vendeur_ID", $id);
        if (empty($check)){
            return false;
        }

        try {
            $statement = $this->connection->prepare("UPDATE vendeur SET Vendeur_Name = ? , Vendeur_FirstName = ?, Vendeur_Bday = ? WHERE Vendeur_ID = ?");
            $statement->execute([$data["Vendeur_Name"], $data["Vendeur_FirstName"], $data["Vendeur_Bday"], $id]);
            
            $update = $this->fetch("Vendeur_ID", $id);
            return $update;
        } catch (PDOException $e) {
            var_dump($e);
        }
    }
}