<?php
    Class seller {
        private $ID;
        private $name;
        private $firstName;
        private $bday;

        public function __construct($id, $name, $firstname ,$bday){
            $this->ID = $id;
            $this->name = $name;
            $this->firstName = $firstname;
            $this->bday = $bday;
        }

        //SUPER SETTER
        public function __set ($prop, $value) {
            if (property_exists($this, $prop)){
                return $this->$prop = $value;
            }
        }

        //SUPER GETTER
        public function __get ($prop){
            if (property_exists($this, $prop)){
                return $this->$prop;
            }  
        }

        //OTHER
    }
?>