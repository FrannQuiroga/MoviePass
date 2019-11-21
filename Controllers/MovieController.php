<?php
    namespace Controllers;

    use DAO\MovieDAO as MovieDAO;
    use DAO\ApiDAO as ApiDAO;
    use DAO\GenreByMovieDAO as GenreByMovieDAO;
    use DAO\GenreDAO as GenreDAO;
    use Models\Movie as Movie;
    use Models\GenreByMovie as GenreByMovie;
    

    class MovieController
    {
        private $movieDAO;
        private $apiDAO;
        private $genreByMovieDAO;
        private $genreDAO;

        public function __construct()
        {
            $this->movieDAO = new MovieDAO();
            $this->apiDAO = new ApiDAO();
            $this->genreByMovieDAO = new GenreByMovieDAO();
            $this->genreDAO = new GenreDAO();

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

        public function ShowPlayingView($orderedBy = "title", $filterGenre = "null", $filterDay = "")
        {
            $today= date('Y-m-d');
            $this->movieDAO->UpdateFunctions();
            $playingList = $this->movieDAO->GetPlayingList($orderedBy,$filterGenre,$filterDay);
            $genreList = $this->genreDAO->Get("name");
            
            require_once(VIEWS_PATH."playing-list.php");
        }

        public function ShowMovieView($id)
        {
            $this->movieDAO->UpdateFunctions();
            $movie = $this->movieDAO->GetMovie($id);
            $functionList = $this->movieDAO->GetFunctionsByMovie($movie);
            require_once(VIEWS_PATH."movie-details.php");
        }

        public function ShowSearchView($searched)
        {
            $this->movieDAO->UpdateFunctions();
            $searchList = $this->movieDAO->GetSearchList($searched);
            require_once(VIEWS_PATH."search-list.php");
        }

        public function Update()
        {
            $movieList = $this->apiDAO->UpdateMovies();
         
            //I am verifying that i am getting at least one movie from the Api
            if($movieList != null)
            {
                $this->movieDAO->Truncate(); //Esta funcion me pone todas las peliculas como no disponibles(dsp voy actualizando)
                //$this->genreByMovieDAO->Truncate(); //VACIO LA TABLA RELACIONAL DE GENEROS POR PELICULA!!

                foreach($movieList as $movie)
                {
                    if($this->movieDAO->ExistsMovie($movie->getId()))//If the movie exists in our DB
                    {
                        $this->movieDAO->EditMovie($movie->getId());//Set this movie as available (isAvailable=1);
                    }
                    else //If is the first time of the movie, I have to persist it in my DB of movies
                    {
                        $this->movieDAO->Add($movie);
                    
                        foreach($movie->getGenres() as $genreByMovie)//I have to agregate the genres of the movie too to the DB of genreByMovie
                        {
                            $this->genreByMovieDAO->Add($genreByMovie);
                        }
                    }
                }
                $this->ShowSuccessfulView(); //Show successful view
            }
            else
            {
                //Unsuccessful. I have to show an error message!!
                
            }
            
        }


    }
?>