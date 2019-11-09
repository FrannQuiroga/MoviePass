<?php
    namespace Controllers;

    use DAO\RoomDAO as RoomDAO;
    use DAO\FunctionDAO as FunctionDAO;
    use DAO\CinemaDAO as CinemaDAO;
    use DAO\MovieDAO as MovieDAO;
    //use Models\Room as Room;
    //use Models\Movie as Movie;
    use Models\Function_ as Function_;
    //use Models\Cinema as Cinema;

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
            $room = $this->roomDAO->getRoom($idRoom);
            $movieList= $this->movieDAO->Get("title");/*Traer peliculas disponibles para armar la funcion*/ 
            /*Que hago con los horarios?? Los quiero predefinidos. 4 distintos y fijos por dia*/
            require_once(VIEWS_PATH."add-function.php");
        }

        public function ShowListView($idRoom) //AGREGAR UN VALOR EN DEFAULT SI NO HAY GET PARA PODER UNIFICAR LAS FUNCIONES!!
        {
            //$room = $this->roomDAO->getById($idRoom);
            //$room->setCinema($this->cinemaDAO->GetById($room->getCinema()->getId())); ///mmmm...
            //$functionList= $this->functionDAO->Get($room);
            $functionList = $this->functionDAO->Get($this->roomDAO->getRoom($idRoom));
            $room = $this->roomDAO->getRoom($idRoom);//PARA PODER MOSTRAR EL NOMBRE DE LA SALA SI NO HAY FUNCIONES!!
            /*foreach($functionList as $function)
            {
                $function->setMovie($this->movieDAO->GetMovie($function->getMovie()->getId()));
            }*/

            /*Voy a mostrar las funciones que hay por sala, me tendria que llegar de arriba su id!! 
             Ahi deberia traer el objeto cine que va dentro del objeto sala, necesito los dos DAO*/
            require_once(VIEWS_PATH."function-list.php");
        }

        public function ShowEditView($idfunction)
        {
            //Deberia mostrarme una vista con los campos que tengo actualmente y la opcion de modificar cuantos quiera
            $function=$this->functionDAO->GetFunction($idfunction);//Traigo la funcion a editar
            $movieList= $this->movieDAO->Get("title");//Traigo toda la lista de peliculas disponibles!!
            //Faltan traer los dias y como los vamos a manejar??? DEFINIR DE UNA VEZ!!
            require_once(VIEWS_PATH."edit-function.php"); //NO ESTA CORREGIDA LA VISTA TODAVIA!!!
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
                $function = new Function_();
                $function->setMovie($this->movieDAO->GetMovie($idMovie));
                $function->setDay($day);
                $function->setTime($time);
                $function->setRoom($this->roomDAO->GetRoom($idRoom));
    
                $this->functionDAO->Add($function);
                //SCRIPT exito!!
                echo "<script> if(confirm('Función agregada con éxito!!'));
                    </script>";
            }
            else
            {
                //SCRIPT ya hay una funcion en la sala para ese dia y horario!!
                echo "<script> if(confirm('Error. Ya hay una función en la sala para ese dia y horario!!'));
                    </script>";
            }
            
            
            $this->ShowAddView($idRoom);
        }

        public function Edit($idFunction,$day,$time,$idMovie,$idRoom)
        {
            //Revisar que si quiero cambiar la pelicula para ese dia no me va a dejar!!
            if(!$this->functionDAO->ExistsFunction($day,$time,$idRoom)) //Si no hay funcion en ese horario, dia y sala.
            {
                $function = new Function_();
                $function->setId($idFunction);
                $function->setDay($day);
                $function->setTime($time);
                $function->setMovie($this->movieDAO->GetMovie($idMovie));
                $function->setRoom($this->roomDAO->GetRoom($idRoom));

                $this->functionDAO->Edit($function);
                echo "<script> if(confirm('Funcion Modificado con Exito!!'));
                    </script>";
                $this->ShowListView($idRoom);
            }
            else
            {
                //SCRIPT ya hay una funcion en sala dia y horario!!
                echo "<script> if(confirm('Error. Ya hay una función en la sala para ese dia y horario!!'));
                    </script>";
                $this->ShowEditView($idFunction);
            }
        }

        public function Remove($idFunction)
        {
            $function = $this->functionDAO->GetFunction($idFunction);
            $this->functionDAO->Remove($idFunction);
            //VER LUEGO VALIDACIONES RESPECTO A LAS ENTRADAS VENDIDAS!!
            $this->ShowListView($function->getRoom()->getId());
        }
    }
?>