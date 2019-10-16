<?php 
    namespace DAO;

    use Models\Genre as Genre;

    interface IGenreDAO{
        
        public function Add(Genre $genre);
        public function Get($ordered);
    }

?>