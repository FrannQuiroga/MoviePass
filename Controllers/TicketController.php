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
        
        public function Add($ticketList) 
        {

            //Validator. The name of the cinema must not exists in our database.
            /*if(!$this->roomDAO->existsRoomName($name,$idCinema)) //If the name doesn't exists we can add it
            {
                $room = new Room();
        
                $room->setName($name);
                $room->setCapacity($capacity);
                $room->setCinema($this->roomDAO->GetCinema($idCinema)); 

                $this->roomDAO->Add($room);
                echo "<script> if(confirm('Sala Agregada con Exito!!'));
                    </script>";
            }
            else
            {
                echo "<script> if(confirm('El nombre ingresado ya existe. Prueba con otro!!'));
                </script>"; 
            }*/
             echo "<script> if(confirm('Agregado al carrito!!'));
                </script>"; 
            $this->ShowAddView($idCinema);
        }

        /*public function Remove($idRoom)
        {
            $room = $this->roomDAO->GetRoom($idRoom);//To get the idRoom to show list view
            //Logic remove to continue having past information
            
            if(empty($this->functionDAO->Get($room)))//If the room is empty I can remove
            {
                $this->roomDAO->Remove($idRoom);
                
                echo "<script> if(confirm('Sala borrada con Exito!!'));
                </script>";
            }
            else 
            {
                echo "<script> if(confirm('La sala no puede ser borrada porque tiene funciones disponibles!!'));
                </script>";
            }

            $this->ShowListView($room->getCinema()->getId());
        }

        public function Edit($name,$capacity,$idCinema,$idRoom)
        {
            //Validator. The name of the cinema must not exists in our database.
            if(!$this->roomDAO->existsRoomName($name,$idCinema)) //If the name doesn't exists we can change it
            {
                $room = new Room();
            
                $room->setId($idRoom);
                $room->setName($name);
                $room->setCapacity($capacity);
                $this->roomDAO->Edit($room);

                echo "<script> if(confirm('Sala Modificada con Exito!!'));
                    </script>";
                $this->ShowListView($idCinema);
            }
            else
            {
                echo "<script> if(confirm('El nombre ingresado ya existe. Prueba con otro!!'));
                </script>"; 
                $this->ShowEditView($idRoom);
            }
        }*/
    }
?>