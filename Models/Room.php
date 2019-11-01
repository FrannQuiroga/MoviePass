<?php
    namespace Models;

    class Room
    {
        private $id;
        private $name;
        private $capacity;
        private $cinema; //no va , pasar el cine
        private $isAvailable;//no va
        private $functionsList = array();

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
            return $this;
        }

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
            return $this;
        }

        public function getCapacity()
        {
            return $this->capacity;
        }

        public function setCapacity($capacity)
        {
            $this->capacity = $capacity;
            return $this;
        }
            
        public function getCinema()
        {
            return $this->cinema;
        }

        public function setCinema($cinema)
        {
            $this->cinema = $cinema;
            return $this;
        }

        public function getIsAvailable()
        {
            return $this->isAvailable;
        }

        public function setIsAvailable($isAvailable)
        {
            $this->isAvailable = $isAvailable;
            return $this;
        }

        public function getFunctionsList()
        {
            return $this->functionsList;
        }

        public function setFunctionsList($functionsList)
        {
            $this->functionsList = $functionsList;
            return $this;
        }
    }
?>