<?php
    namespace Models;

    class Cinema
    {
        private $id;
        private $name;
        private $capacity;
        private $address;
        private $price;
        //private $roomList=array();            

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

        public function getAddress()
        {
            return $this->address;
        }

        public function setAddress($address)
        {
            $this->address = $address;
            return $this;
        }

        public function getPrice()
        {
            return $this->price;
        }

        public function setPrice($price)
        {
            $this->price = $price;
            return $this;
        }

        /*public function getRoomList()
        {
            return $this->roomList;
        }

        public function setRoomList($roomList)
        {
            $this->roomList = $roomList;
            return $this;
        }*/
    }
?>