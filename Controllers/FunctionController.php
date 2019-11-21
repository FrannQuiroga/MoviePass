<?php
    namespace Controllers;

    use DAO\FunctionDAO as FunctionDAO;
    use DAO\MovieDAO as MovieDAO;
    use DAO\TicketDAO as TicketDAO;
    use Models\Function_ as Function_;

    class FunctionController
    {
        private $movieDAO;
        private $functionDAO;
        private $ticketDAO;

        public function __construct()
        {
            $this->functionDAO = new FunctionDAO();
            $this->movieDAO = new MovieDAO();
            $this->ticketDAO = new TicketDAO();
        }

        public function ShowAddView($idRoom,$day=null,$time=null,$idMovie=null)
        {
            /*Necesito el cine para cargar la sala*/
            /*Traer sala*/
            $room = $this->functionDAO->getRoom($idRoom);
            $movieList= $this->movieDAO->Get("title");/*Traer peliculas disponibles para armar la funcion*/ 
            /*Que hago con los horarios?? Los quiero predefinidos. 4 distintos y fijos por dia*/
            require_once(VIEWS_PATH."add-function.php");
        }

        public function ShowListView($idRoom) //AGREGAR UN VALOR EN DEFAULT SI NO HAY GET PARA PODER UNIFICAR LAS FUNCIONES!!
        {
            $room = $this->functionDAO->getRoom($idRoom);//PARA PODER MOSTRAR EL NOMBRE DE LA SALA SI NO HAY FUNCIONES!!
            $functionList = $this->functionDAO->Get($room);

            /*Voy a mostrar las funciones que hay por sala, me tendria que llegar de arriba su id!! 
             Ahi deberia traer el objeto cine que va dentro del objeto sala*/
            require_once(VIEWS_PATH."function-list.php");
        }

        public function ShowEditView($idFunction)
        {
            
            //Deberia mostrarme una vista con los campos que tengo actualmente y la opcion de modificar cuantos quiera
            $function=$this->functionDAO->GetFunction($idFunction);//Traigo la funcion a editar
            $movieList= $this->movieDAO->Get("title");//Traigo toda la lista de peliculas disponibles!!
            
            require_once(VIEWS_PATH."edit-function.php");
        }


        public function Add($idRoom,$day,$time,$idMovie)
        {
            if(!$this->functionDAO->ExistsFunction($day,$time,$idRoom)) //Si no hay funcion en ese horario, dia y sala.
            {
                $function = new Function_();
                $function->setMovie($this->functionDAO->GetMovie($idMovie));
                $function->setDay($day);
                $function->setTime($time);
                $function->setRoom($this->functionDAO->GetRoom($idRoom));
    
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
            
            
            $this->ShowAddView($idRoom,$day,$time,$idMovie);
        }

        public function Edit($idRoom,$day,$time,$idMovie,$idFunction)
        {
            //Revisar que si quiero cambiar la pelicula para ese dia no me va a dejar!!
            //Agregar validacion, si la funcion que existe dia y hora es misma que mi id a modificar!
            if(!$this->functionDAO->EditableFunction($day,$time,$idRoom,$idFunction)) //Si no hay funcion en ese horario, dia y sala.
            {
                $function = new Function_();
                $function->setId($idFunction);
                $function->setDay($day);
                $function->setTime($time);
                $function->setMovie($this->functionDAO->GetMovie($idMovie));
                $function->setRoom($this->functionDAO->GetRoom($idRoom));

                $this->functionDAO->Edit($function);
                echo "<script> if(confirm('Funcion Modificada con Exito!!'));
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
            if(empty($this->ticketDAO->Get($function)))
            {
                $this->functionDAO->Remove($idFunction);
                //VER LUEGO VALIDACIONES RESPECTO A LAS ENTRADAS VENDIDAS!!
                echo "<script> if(confirm('Funcion Eliminada con Exito!!'));
                        </script>";
            }
            else
            {
                echo "<script> if(confirm('Error. No se puede borrar una funcion con entradas asociadas!!'));
                    </script>";
            }
            
            $this->ShowListView($function->getRoom()->getId());
        }

        public function VerifyCart()
        {

        }
    }
?>