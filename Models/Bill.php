<?php namespace Models;

    class Bill
    {
        private $quantity;
        private $discount;
        private $date;
        private $total;
        private $arrayTicket;
    
        public function getQuantity()
        {
                return $this->quantity;
        }

        public function setQuantity($quantity)
        {
                $this->quantity = $quantity;

                return $this;
        }

        public function getDiscount()
        {
                return $this->discount;
        }

        public function setDiscount($discount)
        {
                $this->discount = $discount;

                return $this;
        }

        public function getDate()
        {
                return $this->date;
        }

        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }

        public function getTotal()
        {
                return $this->total;
        }

        public function setTotal($total)
        {
                $this->total = $total;

                return $this;
        }

        public function getArrayTicket()
        {
                return $this->arrayTicket;
        }

        public function setArrayTicket($arrayTicket)
        {
                $this->arrayTicket = $arrayTicket;

                return $this;
        }
    }