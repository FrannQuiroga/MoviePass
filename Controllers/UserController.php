<?php
    namespace Controllers;

    /*use DAO\UserDAO as UserDAO;
    use Models\User as User;*/

    class UserController
    {
        private $userDAO;

        public function __construct()
        {
            /*$this->userDAO = new UserDAO();*/
        }

        public function ShowLoginView()
        {
            require_once(VIEWS_PATH."login.php");
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."add-user.php");
        }

        /*public function ShowListView($orderedBy = "name") //AGREGAR UN VALOR EN DEFAULT SI NO HAY GET PARA PODER UNIFICAR LAS FUNCIONES!!
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

        public function Remove($id)
        {
            //Trabajamos con baja logica para seguir teniendo persistencia de todo
            $this->cinemaDAO->Remove($id);

            $this->ShowListView();
        }

        public function Edit($id)
        {
            //Deberia mostrarme una vista con los campos que tengo actualmente y la opcion de modificar cuantos quiera

        }*/
    }
?>