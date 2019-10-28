<?php
    namespace DAO;

    use DAO\IApiDAO as IApiDAO;

    class ApiDAO implements IApiDAO
    {

        public function UpdateMovies()
        {
            $nowPlayingURL = BASE_API_URL."movie/now_playing?api_key=ff8c41b01da7a16f7b4ca8af1f16f284&language=es-ES";

            $moviesJSON = file_get_contents($nowPlayingURL);
            $movies = json_decode($moviesJSON,true);

            return $movies;
        }

        public function UpdateGenres()
        {
            $genresURL = BASE_API_URL."genre/movie/list?api_key=ff8c41b01da7a16f7b4ca8af1f16f284&language=es-ES";
           
            $moviesJSON = file_get_contents($genresURL);
            $genres = json_decode($moviesJSON,true);

            return $genres;
        }
    }

?>
