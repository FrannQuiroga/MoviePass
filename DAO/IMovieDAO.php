<?php 
    namespace DAO;

    use Models\Movie as Movie;

    interface IMovieDAO{
        
        public function Add(Movie $movie);
        public function Get($orderedBy);
    }

?>