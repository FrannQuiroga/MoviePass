<?php
    namespace Controllers;

    use DAO\TicketDAO as TicketDAO;
    use Models\Ticket as Ticket;
    use Models\Bill as Bill;
    
    class ShoppingController
    {

        private $ticketDAO;

        public function __construct()
        {  
            $this->ticketDAO = new TicketDAO();
        }

        public function ShowShoppingView()
        {
            
            require_once(VIEWS_PATH."shopping-cart.php");
        }

        public function AddTicketShopping($tickets,$idFunction) 
        {
             $ticketList = array();
             
             foreach($tickets as $row){   
                
                $ticket = new Ticket();
                $ticket->setSeatNumber($row);
                $ticket->getQrCode(); //agregar qr
                $ticket->setFunction($this->ticketDAO->GetFunction($idFunction)); 
                
                array_push($ticketList,$ticket);
            }

            
               
            echo "<script> if(confirm('Agregado al carrito!!'));
                    </script>";

            require_once(VIEWS_PATH."shopping-cart.php");
        }
    
    }
?>