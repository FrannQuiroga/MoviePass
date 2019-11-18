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

        public function ShowListView($orderedBy = "title")
        {
            $movieList = $this->movieDAO->Get($orderedBy);
            
            require_once(VIEWS_PATH."movie-list.php");
        } 

        public function ShowPlayingView($orderedBy = "day")
        {
            $playingList = $this->movieDAO->GetPlayingList($orderedBy);
            
            require_once(VIEWS_PATH."playing-list.php");
        }

        public function ShowMovieView($id)//MODIFICADO PARA PRUEBA!
        {
            $movie = $this->movieDAO->GetMovie($id);
            $functionList = $this->movieDAO->GetFunctionsByMovie($movie);//PROBANDO!!!
            require_once(VIEWS_PATH."movie-details.php");
        }

        public function ShowSearchView($searched)
        {
            $searchList = $this->movieDAO->GetSearchList($searched);
            require_once(VIEWS_PATH."search-list.php");
        }

        public function Update()
        {
            $array = $this->apiDAO->UpdateMovies();
         
            //DEBERIA VERIFICAR PREVIO A VACIAR LA TABLA QUE ESTE TRAYENDO AL MENOS UNA PELICULA NUEVA DE LA API!!
            if($array != null)
            {
                $this->movieDAO->Truncate(); //Esta funcion me pone todas las peliculas como no disponibles(dsp voy actualizando)
                //$this->genreByMovieDAO->Truncate(); //VACIO LA TABLA RELACIONAL DE GENEROS POR PELICULA!!

                foreach($array['results'] as $row)
                {
                    if($this->movieDAO->ExistsMovie($row["id"]))//Si la pelicula esta el la bd, la vuelvo a dar de alta
                    {
                        $this->movieDAO->EditMovie($row["id"]);//setea isAvailable en 1.
                    }
                    else //Si es la primera vez, la agrego a la base de datos y guardo sus generos en la tabla relacional
                    {
                        $movie = new Movie();

                        $movie->setPosterPath($row["poster_path"]);
                        $movie->setId($row["id"]);
                        $movie->setTitle($row["title"]);
                        $movie->setVoteAverage($row["vote_average"]);
                        $movie->setOverview($row["overview"]);
                        $movie->setBackdropPath($row["backdrop_path"]);
    
                        $this->movieDAO->Add($movie);
                        
                        // AGREGAR GENEROS CON TABLA INTERMEDIA GENEROS X PELICULA!!
                        foreach($row["genre_ids"] as $id){
                            $genreByMovie = new GenreByMovie();
                            $genreByMovie->setMovieId($movie->getId());
                            $genreByMovie->setGenreId($id);
    
                            $this->genreByMovieDAO->Add($genreByMovie);
                    }
                    
                    }
                }
                $this->ShowSuccessfulView(); //Muestro vista de exito
            }
            else
            {
                //Mostrar mensaje de error en Update peliculas!!
                
            }
            
        }


    }
?>