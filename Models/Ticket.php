<?php
    namespace Models;

    class Ticket
    {
        private $id;
        private $seatNumber;
        private $qrCode;
        private $function; //objeto entero, con sala, cine y pelicula!

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getSeatNumber()
        {
                return $this->seatNumber;
        }

        public function setSeatNumber($seatNumber)
        {
                $this->seatNumber = $seatNumber;

                return $this;
        }

        public function getQrCode()
        {
                return $this->qrCode;
        }

        public function setQrCode($qrCode)
        {
                $this->qrCode = $qrCode;

                return $this;
        }

        public function getFunction()
        {
                return $this->function;
        }

        public function setFunction($function)
        {
                $this->function = $function;

                return $this;
        }
    }
?>