<?php
    namespace Models;

    class GenreByMovie
    {
        private $genreId;
        private $movieId;

        public function getGenreId()
        {
            return $this->genreId;
        }

        public function setGenreId($genreId)
        {
            $this->genreId = $genreId;
            return $this;
        }

        public function getMovieId()
        {
            return $this->movieId;
        }

        public function setMovieId($movieId)
        {
            $this->movieId = $movieId;
            return $this;
        }

    }
?>