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
            $room = new Room();
    
            $room->setName($name);
            $room->setCapacity($capacity);
            $room->setCinema($this->roomDAO->GetCinema($idCinema)); //MODIFICADO

            //Validar que no se repita nombre dentro del cine!!
            $this->roomDAO->Add($room);
            echo "<script> if(confirm('Sala Agregada con Exito!!'));
                </script>";
            
            $this->ShowAddView($room->getCinema()->getId());
        }

        public function Remove($idRoom)
        {
            $room = $this->roomDAO->GetRoom($idRoom);//LO HAGO PARA PODER TENER EL ID DEL CINE Y VOLVER A MOSTRAR LA LISTA
            //Trabajamos con baja logica para seguir teniendo persistencia de todo
            
            if(empty($this->functionDAO->Get($room)))//SI LA SALA NO TIENE FUNCIONES, la puedo borrar
            {
                $this->roomDAO->Remove($idRoom);
                //AGREGAR SCRIPT DE EXITO
                echo "<script> if(confirm('Sala borrada con Exito!!'));
                </script>";
            }
            else 
            {
                //SCRIPT DE ERROR; POR TENER FUNCIONES
                echo "<script> if(confirm('La sala no puede ser borrada porque tiene funciones disponibles!!'));
                </script>";
            }

            //Si borro una sala que tiene funciones,no me tiene que dejar.
            // o preguntar que quiero hacer y borrar las funciones. ver luego tema de entradas vendidas

            $this->ShowListView($room->getCinema()->getId());
        }

        public function Edit($name,$capacity,$idCinema,$id)
        {
            $room = new Room();
            
            $room->setId($id);
            $room->setName($name);
            $room->setCapacity($capacity);
            $this->roomDAO->Edit($room);

            //Agregar restricciones para evitar duplicados de nombre!! o algun script en caso de error.
            echo "<script> if(confirm('Sala Modificada con Exito!!'));
                </script>";
                
            $this->ShowListView($idCinema);
        }
    }
?>