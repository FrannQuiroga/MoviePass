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

        public function ShowListView($idFunction)
        {
            $function = $this->ticketDAO->GetFunction($idFunction);
            $ticketList = $this->ticketDAO->Get($function);
            require_once(VIEWS_PATH."ticket-list.php");
        }
        
        public function GenerateTickets($idFunction)
        {
            $function = $this->ticketDAO->GetFunction($idFunction);
            $seatNumber = 1;
            while($seatNumber <= $function->getRoom()->getCapacity()) //while the seatNumber be minor or equals to the room capacity, iterate and generate a new ticket
            {
                $ticket = new Ticket();
                $ticket->setSeatNumber($seatNumber);
                $ticket->setFunction($function);
                $this->ticketDAO->Add($ticket);
                $seatNumber ++;
            }
        }
    }
?>