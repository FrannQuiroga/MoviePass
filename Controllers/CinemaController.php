<?php
    namespace Controllers;

    use DAO\CinemaDAO as CinemaDAO;
    use DAO\RoomDAO as RoomDAO;
    use Models\Cinema as Cinema;

    class CinemaController
    {
        private $cinemaDAO;

        public function __construct()
        {
            $this->cinemaDAO = new CinemaDAO();
            $this->roomDAO = new RoomDAO();
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."add-cinema.php");
        }

        public function ShowListView($orderedBy = "name") //AGREGAR UN VALOR EN DEFAULT SI NO HAY GET PARA PODER UNIFICAR LAS FUNCIONES!!
        {
            $cinemaList = $this->cinemaDAO->Get($orderedBy);

            require_once(VIEWS_PATH."cinema-list.php");
        }

        public function ShowEditView($id)
        {
            //Deberia mostrarme una vista con los campos que tengo actualmente y la opcion de modificar cuantos quiera
            $cinema = $this->cinemaDAO->GetCinema($id);
            require_once(VIEWS_PATH."edit-cinema.php");
        }


        public function Add($name,$capacity,$address,$price)
        {
            $cinema = new Cinema();
    
            $cinema->setName($name);
            $cinema->setCapacity($capacity);
            $cinema->setAddress($address);
            $cinema->setPrice($price);

            $this->cinemaDAO->Add($cinema);

            $this->ShowAddView();
        }

        public function Remove($idCinema)
        {
            $cinema = $this->cinemaDAO->GetCinema($idCinema);
            //Trabajamos con baja logica para seguir teniendo persistencia de todo
            if(empty($this->roomDAO->Get($cinema)))//SI EL CINE TIENE SALAS; NO DEJA BORRARLO!!
                $this->cinemaDAO->Remove($idCinema);
                //AGREGAR SCRIPT EXITO
            else {} //AGREGAR SCRIPT ERROR; POR TENER SALAS ASOCIADAS
            $this->ShowListView();
        }

        public function Edit($name,$capacity,$address,$price,$id)
        {
            //AGREGAR VALIDACIONES!! ESTAMOS REEMPLAZANDO TODOS LOS CAMPOS SIN VER SI FUERON MODIFICADOS!!

            $cinema = new Cinema();
            
            $cinema->setId($id);
            $cinema->setName($name);
            $cinema->setCapacity($capacity);
            $cinema->setAddress($address);
            $cinema->setPrice($price);

            $this->cinemaDAO->Edit($cinema);
            //HABRIA QUE VER QUE NO HAYA ERRORES LA CARGA DE DATOS EN BD! VALIDAR
            $this->ShowListView();
        }
    }
?>