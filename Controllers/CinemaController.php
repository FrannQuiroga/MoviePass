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

        public function ShowListView($orderedBy = "name") // Default value to reuse code
        {
            $cinemaList = $this->cinemaDAO->Get($orderedBy);

            require_once(VIEWS_PATH."cinema-list.php");
        }

        public function ShowEditView($id)
        {
            //We can see the current fields at the placeholder and we can modify as much as we want.
            $cinema = $this->cinemaDAO->GetCinema($id);
            require_once(VIEWS_PATH."edit-cinema.php");
        }


        public function Add($name,$capacity,$address,$price)
        {
            //Validator. The name of the cinema must not exists in our database.
            if(!$this->cinemaDAO->existsCinemaName($name)) //If the name doesn't exists we can add it
            {
                $cinema = new Cinema();
    
                $cinema->setName($name);
                $cinema->setCapacity($capacity);
                $cinema->setAddress($address);
                $cinema->setPrice($price);
    
                $this->cinemaDAO->Add($cinema); //Add successfull
                echo "<script> if(confirm('Cine Agregado con Exito!!'));
                    </script>";
            }
            else
            {
                echo "<script> if(confirm('El nombre ingresado ya existe. Prueba con otro!!'));
                    </script>";
            }
            $this->ShowAddView();
        }

        public function Remove($idCinema)
        {
            $cinema = $this->cinemaDAO->GetCinema($idCinema);
            //We work with logic remove (1 or 0) to have always the past information
            if(empty($this->roomDAO->Get($cinema,"name")))
            //If the cinema has rooms you can´t remove it. Validator
            {
                $this->cinemaDAO->Remove($idCinema);
                
                echo "<script> if(confirm('Cine Eliminado con Exito!!'));
                </script>";
            }
            else //SCRIPT ERROR; the cinema has rooms asociated
            {
                echo "<script> if(confirm('El cine no puede ser borrado porque tiene salas asociadas!!'));
                </script>";
            }
            $this->ShowListView();
        }

        public function Edit($name,$capacity,$address,$price,$id)
        {
            //Validator. The name of the cinema must not exists in our database.
            if(!$this->cinemaDAO->existsCinemaName($name)) //If the name doesn't exists we can add it
            {
                $cinema = new Cinema();
                
                $cinema->setId($id);
                $cinema->setName($name);
                $cinema->setCapacity($capacity);
                $cinema->setAddress($address);
                $cinema->setPrice($price);

                $this->cinemaDAO->Edit($cinema);
                
                echo "<script> if(confirm('Cine Modificado con Exito!!'));
                    </script>";
                $this->ShowListView();
            }
            else
            {
                echo "<script> if(confirm('El nombre ingresado ya existe. Prueba con otro!!'));
                    </script>";
                    $this->ShowEditView($id);
            }
        }
    }
?>