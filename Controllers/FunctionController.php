<?php
    namespace Controllers;

    use DAO\RoomDAO as RoomDAO;
    use DAO\FunctionDAO as FunctionDAO;
    use DAO\CinemaDAO as CinemaDAO;
    use DAO\MovieDAO as MovieDAO;
    use Models\Room as Room;
    use Models\Movie as Movie;
    use Models\Function_ as Function_;
    use Models\Cinema as Cinema;

    class FunctionController
    {
        private $roomDAO;
        private $movieDAO;
        private $functionDAO;
        private $cinemaDAO;

        public function __construct()
        {
            $this->roomDAO = new RoomDAO();
            $this->functionDAO = new FunctionDAO();
            $this->movieDAO = new MovieDAO();
            $this->cinemaDAO = new CinemaDAO();
        }

        public function ShowAddView($idRoom)
        {
            /*Necesito el cine para cargar la sala*/
            /*Traer sala*/
            $daysList = $this->getAvailablesDays(); //Genero una lista de dias(desde hoy) //FORZADO DE PRUEBA
            $room = $this->roomDAO->getById($idRoom);
            $movieList= $this->movieDAO->Get("title");/*Traer peliculas disponibles para armar la funcion*/ 
            /*Que hago con los horarios?? Los quiero predefinidos. 4 distintos y fijos por dia*/
            require_once(VIEWS_PATH."add-function.php");
        }

        public function ShowListView($idRoom) //AGREGAR UN VALOR EN DEFAULT SI NO HAY GET PARA PODER UNIFICAR LAS FUNCIONES!!
        {
            $room = $this->roomDAO->getById($idRoom);
            $room->setCinema($this->cinemaDAO->GetById($room->getCinema()->getId())); ///mmmm...
            $functionList= $this->functionDAO->Get($room);
            foreach($functionList as $function)
            {
                $function->setMovie($this->movieDAO->GetMovie($function->getMovie()->getId()));
            }
            /*Voy a mostrar las funciones que hay por sala, me tendria que llegar de arriba su id!! 
             Ahi deberia traer el objeto cine que va dentro del objeto sala, necesito los dos DAO*/
            require_once(VIEWS_PATH."function-list.php");
        }

        private function getAvailablesDays() //Aux para generar un arreglo de dias consecutivos tipo DateTime();
        {
            $daysList = array();
            $day = new \DateTime(); //fecha de hoy
            $cantDays = 7;//por siete dias mas
            

            for($i=0; $i<$cantDays;$i++)
            {
                $day->modify('+1 day');
                $thisDay = clone $day;
                array_push($daysList,$thisDay);
            }

            return $daysList;
        }

        public function Add($idRoom,$day,$time,$idMovie)
        {
            if(!$this->functionDAO->ExistsFunction($day,$time,$idRoom)) //Si no hay funcion en ese horario, dia y sala.
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
                //SCRIPT exito!!
                echo "<script> if(confirm('Función agregada con éxito!!'));
                    </script>";
            }
            else
            {
                //SCRIPT ya hay una funcion en sala dia y horario!!
                echo "<script> if(confirm('Error. El horario ingresado para ese dia ya existe en la sala!!'));
                    </script>";
            }
            
            
            $this->ShowAddView($idRoom);
        }

        public function Remove($id)
        {
            $function = $this->functionDAO->GetById($id);
            $this->functionDAO->Remove($id);
            //VER LUEGO VALIDACIONES RESPECTO A LAS ENTRADAS VENDIDAS!!
            $this->ShowListView($function->getRoom()->getId());
        }

        public function Edit($id)
        {
            //Deberia mostrarme una vista con los campos que tengo actualmente y la opcion de modificar cuantos quiera
        }
    }
?>