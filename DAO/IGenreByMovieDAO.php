<?php 
    namespace DAO;

    use Models\GenreByMovie as GenreByMovie;

    interface IGenreByMovieDAO{
        
        public function Add(GenreByMovie $genreByMovie);
        public function Truncate();
        public function Get();
    }

?>