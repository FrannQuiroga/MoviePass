<?php
    namespace Controllers;

    use DAO\GenreDAO as GenreDAO;
    use DAO\ApiDAO as ApiDAO;
    use Models\Genre as Genre;
    

    class GenreController
    {
        private $genreDAO;
        private $apiDAO;

        public function __construct()
        {
            $this->genreDAO = new GenreDAO();
            $this->apiDAO = new ApiDAO();

        }

        public function ShowSuccessfulView()
        {
            require_once(VIEWS_PATH."genre-successful.php");
        }

        public function ShowListView($orderedBy = "name asc") //DEFAULT PARA UNIFICAR
        {
            $genreList = $this->genreDAO->Get($orderedBy);

            require_once(VIEWS_PATH."genre-list.php");
        }

        public function Truncate()
        {
            $this->genreDAO->Truncate();
            $this->ShowListView();
        }

        public function Update()
        {
            $array = $this->apiDAO->UpdateGenres();
         //DEBERIA VERIFICAR PREVIO A VACIAR LA TABLA QUE ESTE TRAYENDO AL MENOS UN GENERO NUEVO DE LA API!!
            if($array != null)
            {
                $this->genreDAO->Truncate(); //AGREGO ESTA FUNCION PARA VACIAR LA TABLA ANTES DE ACTUALIZAR!! (en prueba)

                foreach($array['genres'] as $row)
                {
                    $genre = new Genre();
    
                    $genre->setId($row["id"]);
                    $genre->setName($row["name"]);
    
                    $this->genreDAO->Add($genre);
                }
                $this->ShowSuccessfulView();
            }
            else
            {
                //MOSTRAR MENSAJE DE ERROR EN LA ACTUALIZACION DE BD!!
            }
        }
    }
?>