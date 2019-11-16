<?php
    namespace Controllers;

    use DAO\RoomDAO as RoomDAO;
    use DAO\FunctionDAO as FunctionDAO;
    use Models\Room as Room;

    class RoomController
    {
        private $roomDAO;
        private $functionDAO;

        public function __construct()
        {
            $this->roomDAO = new RoomDAO();
            $this->functionDAO = new FunctionDAO();
        }

        public function ShowAddView($idCinema)
        {
            $cinema = $this->roomDAO->GetCinema($idCinema); //--->>>((preguntar a ver que onda!!!))<<<---
            //LO PODRIA BUSCAR POR ROOMDAO PORQUE LO TENGO EN BASEDAO!! 
            require_once(VIEWS_PATH."add-room.php");
        }

        public function ShowListView($idCinema, $orderedBy = "name") //AGREGAR UN VALOR EN DEFAULT SI NO HAY GET PARA PODER UNIFICAR LAS FUNCIONES!!
        {
            $cinema = $this->roomDAO->GetCinema($idCinema);//Guardo en variable para poder mostrar nombre si no tiene salas!!
            $roomList = $this->roomDAO->Get($cinema,$orderedBy);

            require_once(VIEWS_PATH."room-list.php");
        }

        public function ShowEditView($idRoom)
        {
            //Deberia mostrarme una vista con los campos que tengo actualmente y la opcion de modificar cuantos quiera
            $room=$this->roomDAO->GetRoom($idRoom);

            require_once(VIEWS_PATH."edit-room.php");
        }

        public function Add($name,$capacity,$idCinema)
        {
            //Validator. The name of the cinema must not exists in our database.
            if(!$this->roomDAO->existsRoomName($name,$idCinema)) //If the name doesn't exists we can add it
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
            }
            
            $this->ShowAddView($idCinema);
        }

        public function Remove($idRoom)
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
        }
    }
?>