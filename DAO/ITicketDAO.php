<?php 
    namespace DAO;

    use Models\Ticket as Ticket;

    interface ITicketDAO{
        public function Add(Ticket $ticket);
    }

?>