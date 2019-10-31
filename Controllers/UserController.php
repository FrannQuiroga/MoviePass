<?php
    namespace Controllers;

    use DAO\UserDAO as UserDAO;
    use DAO\UserProfileDAO as UserProfileDAO;
    use Models\User as User;
    use Models\UserProfile as UserProfile;
    

    class UserController
    {
        private $userDAO;
        private $userProfileDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
            $this->userProfileDAO =new UserProfileDAO;
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
            
            $loginUser=$this->userDAO->GetUser($email,$password);
            if(!empty($loginUser)){
                echo "<script> if(confirm('El usuario ya está registrado!!'));
                </script>";
                $this->ShowAddView(); //entra pero igual crea el usuario
            }
            else{

            $userProfile= new UserProfile();
            $userProfile->setName($name);
            $userProfile->setSurname($surname);
            $userProfile->setDocument($document);
            $this->userProfileDAO->Add($userProfile);

            $user = new User();
            $user->setUserProfile($this->userProfileDAO->getbyDocument($document)); //no se si esta bien asi pero funciona
            $user->setEmail($email);
            $user->setPassword($password);

            $this->userDAO->Add($user);

            //cambiar la ruta 
            require_once(VIEWS_PATH."About-us.php");}
        }

        public function Login($email,$password)
        {
            $loginUser=$this->userDAO->GetUser($email,$password);

            if(empty($loginUser)){
                echo "<script> if(confirm('datos incorrectos!!'));
                </script>";
                $this->ShowLoginView(); 
            }
            else{
                //cambiar al home del usuario registrado
                require_once(VIEWS_PATH."home.php");
            }
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