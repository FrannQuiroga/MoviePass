<?php
    namespace Controllers;

    use DAO\TicketDAO as TicketDAO;
    
    use Models\Ticket as Ticket;

    class TicketController
    {
        private $ticketDAO;

        public function __construct()
        {
            $this->ticketDAO = new TicketDAO();
            
        }
        //FALTAN METODOS
    }
?>