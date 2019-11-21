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
            if($ticketList== null){
                $this->GenerateTickets($idFunction);
            }
            $ticketList = $this->ticketDAO->Get($function);
            require_once(VIEWS_PATH."ticket-list.php");
        }

        public function ShowCartView($idFunction,$quantity=2)
        { 
            
            $function = $this->ticketDAO->GetFunction($idFunction);
            $availableTickets = $this->ticketDAO->GetAvailableTickets($function);
            
            
            if($quantity > $availableTickets)
            {
                echo "<script> if(confirm('Lo sentimos, la funcion no dispone de entradas disponibles. Pruebe con otra!!'));
                        </script>";
                
                
            }
    
            require_once(VIEWS_PATH."shopping-cart.php");
        }
        
        public function GenerateTickets($idFunction)
        {
            $function = $this->ticketDAO->GetFunction($idFunction);
            $seatNumber = 1;
            while($seatNumber <= $function->getRoom()->getCapacity()) //while the seatNumber be minor or equal to the room capacity, iterate and generate a new ticket
            {
                $ticket = new Ticket();
                $ticket->setSeatNumber($seatNumber);
                $ticket->setFunction($function);
                $this->ticketDAO->Add($ticket);
                $seatNumber ++;
            }
            echo "<script> if(confirm('Entradas generadas con Exito!!'));
                        </script>";

            $this->ShowListView($idFunction);
        }

        public function SendMail($mail,$description)
        {
           ini_set( 'display_errors', 1 );
    	   error_reporting( E_ALL );
           $from = "moviepass.mardelplata@gmail.com";
           $to = $mail;
    	   $subject = "Compra confirmada MoviePass";
            $message = "ACA IRIA LA INFO DE SUS ENTRADAS COMPRADAS";
            $headers = "From:" . $from;
            mail($to,$subject,$message, $headers);
    
            //CUENTA CREADA PARA MOVIEPASS 
            //username=moviepass.mardelplata@gmail.com
            //password=moviepass2019
        }

        public function GenerateQR($uniqueCode,$clientName)
        {
           require "phpqrcode/qrlib.php";    
	
            //Declaramos una carpeta temporal para guardar la imagenes generadas
            $dir = 'IMG_PATH';
            
            //Si no existe la carpeta la creamos
            if (!file_exists($dir))
                mkdir($dir);
            
                //Declaramos la ruta y nombre del archivo a generar
            $filename = $dir.$clientName.".png";
        
                //Parametros de Condiguraci�n
            
            $size = 10; //Tama�o de Pixel
            $level = 'L'; //Precisi�n Baja
            $framSize = 3; //Tama�o en blanco
            $contenido = $uniqueCode; //Texto
            
                //Enviamos los parametros a la Funci�n para generar c�digo QR 
            QRcode::png($contenido, $filename, $level, $size, $framSize); 
            
            //Mostramos la imagen generada
            echo '<img src="'.$dir.basename($filename).'" /><hr/>'; 
        }

        public function BuyTickets($quantity,$idFunction)
        {
            $description= "aca va la descripcion de las entradas adquiridas!!";
            $this->ticketDAO->BuyTickets($idFunction,$quantity);
            
            $loggedUser= $_SESSION["loggedUser"];
            //$infoQR= "Peli: ".$function->getMovie()->getTitle().", Horario: ".$function->getDay()." ".$function->getTime();
            //$this->GenerateQR($infoQR,$loggedUser->getName());
            $this->SendMail($loggedUser->getEmail(),$description);

            echo "<script> if(confirm('Entradas compradas con Exito. Ya puede verlas en su perfil!!'));
                        </script>";
            header ("location:../User/ShowProfileView");
            
        }
    }
?>