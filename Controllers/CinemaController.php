<?php
    namespace Controllers;

    use DAO\CinemaDAO as CinemaDAO;
    use Models\Cinema as Cinema;

    class CinemaController
    {
        private $cinemaDAO;

        public function __construct()
        {
            $this->cinemaDAO = new CinemaDAO();
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
            //Trabajamos con baja logica para seguir teniendo persistencia de todo
            $this->cinemaDAO->Remove($idCinema);

            $this->ShowListView();
        }

        public function Edit($idCinema)
        {
            //Deberia mostrarme una vista con los campos que tengo actualmente y la opcion de modificar cuantos quiera

        }
    }
?>