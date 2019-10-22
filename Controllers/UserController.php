<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use Models\User as User;

    class UserController
    {
        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function ShowLoginView()
        {
            require_once(VIEWS_PATH."login.php");
        }

        public function ShowAddView()
        {
            require_once(VIEWS_PATH."add-user.php");
        }

        public function ShowListView($orderedBy = "id") 
        {
            $userList = $this->userDAO->Get($orderedBy);

            require_once(VIEWS_PATH."user-list.php");
        }


        public function Add($name,$surname,$document,$email,$password)
        {
            $user = new User();
            $user->setName($name);
            $user->setSurname($surname);
            $user->setDocument($document);
            $user->setEmail($email);
            $user->setPassword($password);

            $this->userDAO->Add($user);

            $this->ShowAddView();
        }

        public function Remove($id)
        {
            //Trabajamos con baja logica para seguir teniendo persistencia de todo
            $this->userDAO->Remove($id);

            $this->ShowListView();
        }

        /*public function Edit($id)
        {
            //Deberia mostrarme una vista con los campos que tengo actualmente y la opcion de modificar cuantos quiera

        }*/
    }
?>