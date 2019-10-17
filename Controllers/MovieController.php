<?php
    namespace Controllers;

    use DAO\MovieDAO as MovieDAO;
    use DAO\ApiDAO as ApiDAO;
    use DAO\GenreByMovieDAO as GenreByMovieDAO;
    use Models\Movie as Movie;
    use Models\GenreByMovie as GenreByMovie;
    

    class MovieController
    {
        private $movieDAO;
        private $apiDAO;
        private $genreByMovieDAO;

        public function __construct()
        {
            $this->movieDAO = new MovieDAO();
            $this->apiDAO = new ApiDAO();
            $this->genreByMovieDAO = new GenreByMovieDAO();

        }

        public function ShowSuccessfulView()
        {
            require_once(VIEWS_PATH."movie-successful.php");
        }

        public function ShowListView($orderedBy = "original_title")
        {
            $movieList = $this->movieDAO->Get($orderedBy);
            
            require_once(VIEWS_PATH."movie-list.php");
        } 

        public function Update()
        {
            $array = $this->apiDAO->UpdateMovies();
         
            //DEBERIA VERIFICAR PREVIO A VACIAR LA TABLA QUE ESTE TRAYENDO AL MENOS UNA PELICULA NUEVA DE LA API!!
            if($array != null)
            {
                $this->movieDAO->Truncate(); //AGREGO ESTA FUNCION PARA VACIAR LA TABLA ANTES DE ACTUALIZAR!! (en prueba)
                $this->genreByMovieDAO->Truncate(); //VACIO LA TABLA RELACIONAL DE GENEROS POR PELICULA!!

                foreach($array['results'] as $row)
                {
                    $movie = new Movie();

                    $movie->setPosterPath($row["poster_path"]);
                    $movie->setId($row["id"]);
                    $movie->setOriginalTitle($row["original_title"]);
                    $movie->setVoteAverage($row["vote_average"]);
                    $movie->setOverview($row["overview"]);

                    $this->movieDAO->Add($movie);
                    
                    //AGREGAR GENEROS CON TABLA INTERMEDIA GENEROS X PELICULA!!
                    foreach($row["genre_ids"] as $id){
                        $genreByMovie = new GenreByMovie();
                        $genreByMovie->setMovieId($movie->getId());
                        $genreByMovie->setGenreId($id);

                        $this->genreByMovieDAO->Add($genreByMovie);
                    }
                }
                $this->ShowSuccessfulView(); 
            }
            else
            {
                //Mostrar mensaje de error en Update peliculas!!
            }
            
        }


    }
?>