<?php
    namespace Controllers;

    use DAO\RoomDAO as RoomDAO;
    use DAO\CinemaDAO as CinemaDAO;
    use Models\Room as Room;
    use Models\Cinema as Cinema;
    //use Models\Function as Function;

    class RoomController
    {
        private $roomDAO;
        private $cinemaDAO;

        public function __construct()
        {
            $this->roomDAO = new RoomDAO();
            $this->cinemaDAO = new CinemaDAO();
        }

        public function ShowAddView($idCinema)
        {
            $cinema = $this->cinemaDAO->GetById($idCinema);
            require_once(VIEWS_PATH."add-room.php");
        }

        public function ShowListView($idCinema, $orderedBy = "name") //AGREGAR UN VALOR EN DEFAULT SI NO HAY GET PARA PODER UNIFICAR LAS FUNCIONES!!
        {
            $cinema = $this->cinemaDAO->GetById($idCinema);
            $roomList = $this->roomDAO->Get($orderedBy,$cinema);

            require_once(VIEWS_PATH."room-list.php");
        }

        public function Add($name,$capacity,$idCinema)
        {
            $room = new Room();
    
            $room->setName($name);
            $room->setCapacity($capacity);
            $room->setCinema($this->cinemaDAO->GetById($idCinema)); //MODIFICADO

            //AGREGAR LAS FUNCIONES A LA SALA 

            //QUE HAGO CON EL ID DEL CINE? SE GUARDA EN EL OBJETO O UN CAMPO SEPARADO PARA LA BD??

            $this->roomDAO->Add($room);
            
            $this->ShowAddView($room->getCinema()->getId());
        }

        public function Remove($idRoom)
        {
            $room = $this->roomDAO->GetById($idRoom);//LO HAGO PARA PODERTENER EL ID DEL CINE Y VOLVER A MOSTRAR LA LISTA
            //Trabajamos con baja logica para seguir teniendo persistencia de todo
            $this->roomDAO->Remove($idRoom);//VER SI PASO EL ROOM O SOLO ID
            
            $this->ShowListView($room->getCinema()->getId());
        }

        public function Edit($idRoom)
        {
            //Deberia mostrarme una vista con los campos que tengo actualmente y la opcion de modificar cuantos quiera

        }
    }
?>