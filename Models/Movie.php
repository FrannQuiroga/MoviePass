<?php
    namespace Models;

    class Movie
    {
        private $posterPath;
        private $id;
        private $originalTitle;
        private $genres = array();
        private $voteAverage;
        private $overview;
  
        public function getPosterPath()
        {
                return $this->posterPath;
        }

        public function setPosterPath($posterPath)
        {
                $this->posterPath = $posterPath;

                return $this;
        }

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }

        public function getOriginalTitle()
        {
                return $this->originalTitle;
        }

        public function setOriginalTitle($originalTitle)
        {
                $this->originalTitle = $originalTitle;

                return $this;
        }

        public function getGenres()
        {
                return $this->genres;
        }

        public function setGenres($genres)
        {
                $this->genres = $genres;

                return $this;
        }

        public function getVoteAverage()
        {
                return $this->voteAverage;
        }

        public function setVoteAverage($voteAverage)
        {
                $this->voteAverage = $voteAverage;

                return $this;
        }

        public function getOverview()
        {
                return $this->overview;
        }

        public function setOverview($overview)
        {
                $this->overview = $overview;

                return $this;
        }
    }
?>