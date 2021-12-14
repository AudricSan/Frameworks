<?php
    Class Car {
        private $ID;
        private $serial;
        private $power;
        private $color;

        public function __construct($ID, $num, $power ,$color){
            $this->serial = $num;
            $this->color = $color;
            $this->power = $power;
            $this->ID = $ID;
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