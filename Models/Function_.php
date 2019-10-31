<?php
    namespace Models;

    class Function_
    {
        private $id;
        private $day;
        private $time;
        private $movie;
        //-------------faltaba el cine
        private $room;
        //------------
        private $ticketsList = array();

        
        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
            return $this;
        }

        public function getDay()
        {
            return $this->day;
        }

        public function setDay($day)
        {
            $this->day = $day;
            return $this;
        }

        public function getTime()
        {
            return $this->time;
        }

        public function setTime($time)
        {
            $this->time = $time;
            return $this;
        }

        public function getMovie()
        {
            return $this->movie;
        }

        public function setMovie($movie)
        {
            $this->movie = $movie;
            return $this;
        }

        public function getTicketsList()
        {
            return $this->ticketsList;
        }

        public function setTicketsList($ticketsList)
        {
            $this->ticketsList = $ticketsList;
            return $this;
        }

       
        public function getRoom()
        {
                return $this->room;
        }

       
        public function setRoom($room)
        {
                $this->room = $room;

                return $this;
        }
    }
?>