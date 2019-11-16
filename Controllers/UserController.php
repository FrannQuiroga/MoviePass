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
            $this->userProfileDAO =new UserProfileDAO();
        }

        public function ShowloggedView() //when you login you must see the billboard!!
        {
            require_once(VIEWS_PATH."carrousel.php");
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

        public function ShowProfileView()
        {
            $user = $_SESSION["loggedUser"];
            require_once(VIEWS_PATH."profile-view.php");
        }

        public function Add($name,$surname,$document,$email,$password)
        {
            
            $loggedUser = $this->userDAO->GetByEmail($email);
            if(!empty($loggedUser))
            {
                echo "<script> if(confirm('El usuario ya está registrado, por favor utilice otro email!!'));
                </script>";
                $this->ShowAddView(); //Vuelve a la vista de registro
            }
            else
            {
                $loggedProfile = $this->userProfileDAO->GetByDocument($document);

                if(!is_null($loggedProfile))
                {
                    echo "<script> if(confirm('El documento ingresado ya pertenece a un usuario en sistema, vuelva a intentarlo!!'));
                    </script>";
                    $this->ShowAddView(); //Vuelve a la vista de registro
                }
                else
                {
                    $userProfile= new UserProfile();
                    $userProfile->setName($name);
                    $userProfile->setSurname($surname);
                    $userProfile->setDocument($document);
                    $this->userProfileDAO->Add($userProfile);

                    $user = new User();
                    $user->setUserProfile($this->userProfileDAO->GetbyDocument($document)); //Lo tengo que traer del DAO despues que lo agrego para poder tener un id asociado
                    $user->setEmail($email);
                    $user->setPassword($password);

                    $this->userDAO->Add($user);

                    echo "<script> if(confirm('Usuario registrado con exito!! Ya puede ingresar.'));
                    </script>"; 
                    $this->ShowLoginView();
                }
            }
        }

        public function Login($email,$password)
        {
            $loginUser=$this->userDAO->GetByEmail($email);

            if(empty($loginUser)){
                echo "<script> if(confirm('Datos incorrectos, vuelva a intentarlo !'));";  
                echo "window.location = './login.php'; </script>";
                //$this->ShowLoginView(); 
            }
            else
            {
                if($password === $loginUser->getPassword())
                {
                    //DATOS CORRECTOS; SE LOGEA CON EXITO E INICIA LA SESSION!!
                    $_SESSION["loggedUser"] = $loginUser;
                    //$this->ShowloggedView();
                    if($loginUser->getIsAdmin()== 1)
                    {
                        header ("location:../Cinema/ShowListView");
                    }
                    else
                        header ("location:../Movie/ShowPlayingView");
                }
                else
                {
                    //PASSWORD NO COINCIDE! Vuelve a login View
                    echo "<script> if(confirm('Datos incorrectos, la contraseña ingresada no es válida!!'));
                    </script>";
                    $this->ShowLoginView(); 
                }
            }
        }

        public function Logout()
        {
            session_destroy();
            echo "<script> if(confirm('Sesion cerrada con exito!'));";  
            echo "window.location = '../'; </script>";
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