<?php
class carDAO{

    // Change the values according to your hosting.
    private $username = "root";     //The login to connect to the DB
    private $password = "";         //The password to connect to the DB
    private $host = "localhost";    //The name of the server where my DB is located
    private $dbname = "poo review";    //The name of the DB you want to attack.

    //DON'T TOUCH IT, LITTLE PRICK
    private $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

    public function __construct () {
        
        $this->table = "voiture"; // The table to attack => OU CAN EDIT THIS LINE

        $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password, $this->options);;
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function create ($result) {
        return new Car(
            $result['Voiture_ID'],
            $result['Voiture_Chassis'],
            $result['Voiture_Puissance'],
            $result['Voiture_Couleur']
        );
    }


    public function fetch ($id) {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table} WHERE Voiture_ID = ?");
            $statement->execute([$id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            // var_dump($result);
            // var_dump($statement);
            $car = $this->create($result);
            return $car;

        } catch (PDOException $e) {
            var_dump($e);
        }
    }

    public function fetchAll () {
        try {
            $statement = $this->connection->prepare("SELECT * FROM {$this->table}");
            $statement->execute();
            
            $result = array();
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);

            // var_dump($result);
            // var_dump($statement);

            $car = array();
            foreach($result as $value){
                // var_dump($value);
                $car[] = $this->create($value);
            }
            return $car;

        } catch (PDOException $e) {
            var_dump($e);
        }
    }
}
