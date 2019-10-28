<?php
    namespace Controllers;

    use DAO\RoomDAO as RoomDAO;
    use DAO\FunctionDAO as FunctionDAO;
    use DAO\MovieDAO as MovieDAO;
    use Models\Room as Room;
    use Models\Movie as Movie;
    use Models\Function_ as Function_;

    class FunctionController
    {
        private $roomDAO;
        private $movieDAO;
        private $functionDAO;

        public function __construct()
        {
            $this->roomDAO = new RoomDAO();
            $this->functionDAO = new FunctionDAO();
            $this->movieDAO = new MovieDAO();
        }

        public function ShowAddView($idRoom)
        {
            /*Necesito el cine para cargar la sala*/
            /*Traer sala*/
            $room = $this->roomDAO->getById($idRoom);
            $movieList= $this->movieDAO->Get("title");/*Traer peliculas disponibles para armar la funcion*/ 
            /*Que hago con los horarios?? Los quiero predefinidos. 4 distintos y fijos por dia
             En cuanto al dia, deberia poder agregar solo de jueves a miercoles siguiente!!*/
            require_once(VIEWS_PATH."add-function.php");
        }

        public function ShowListView() //AGREGAR UN VALOR EN DEFAULT SI NO HAY GET PARA PODER UNIFICAR LAS FUNCIONES!!
        {
            /*Voy a mostrar las funciones que hay por sala, me tendria que llegar de arriba su id!! 
             Ahi deberia traer el objeto cine que va dentro del objeto sala, necesito los dos DAO*/
            require_once(VIEWS_PATH."function-list.php");
        }

        public function Add($idRoom,$day,$time,$idMovie)
        {
            $movie = new Movie();
            $movie->setId($idMovie);
            $room = new Room();
            $room->setId($idRoom);
            
            $function = new Function_();
            $function->setMovie($movie);
            $function->setDay($day);
            $function->setTime($time);
            $function->setRoom($room);

            $this->functionDAO->Add($function);
            

        }

        public function Remove($id)
        {
            
        }

        public function Edit($id)
        {
            //Deberia mostrarme una vista con los campos que tengo actualmente y la opcion de modificar cuantos quiera
        }
    }
?>