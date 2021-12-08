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

        /*
            //SETTER
            public function setnumber($num){
                return $this->_serial = $num;
            }

            public function setcolor($color){
                return $this->_color = $color;
            }

            public function setpower($power){
                return $this->_power = $power;
            }

            public function setid($ID){
                return $this->_ID = $ID;
            }

            //GETTER
            public function getnumber(){
                return $this->_serial;
            }

            public function getcolor(){
                return $this->_color;
            }

            public function getpower(){
                return $this->_power;
            }

            public function getid(){
                return $this->_ID;
            }
        */

        //OTHER

    }
?>