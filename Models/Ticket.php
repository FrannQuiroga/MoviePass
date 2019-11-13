<?php
    namespace Models;

    class Ticket
    {
        private $id;
        private $seatNumber;
        private $qrCode;
        private $function; //objeto entero, con sala, cine y pelicula!

        public private getId() 
        {
            return this.$id;
        }

        public void setId($id) 
        {
            this.$id = $id;
        }

        public private getSeatNumber() 
        {
            return this.$seatNumber;
        }

        public void setSeatNumber($seatNumber) 
        {
            this.$seatNumber = $seatNumber;
        }

        public private getQrCode() 
        {
            return this.$qrCode;
        }

        public void setQrCode($qrCode) 
        {
            this.$qrCode = $qrCode;
        }

        public private getFunction() 
        {
            return this.$function;
        }

        public void setFunction($function) 
        {
            this.$function = $function;
        }


    }
?>