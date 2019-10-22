<?php
    namespace Models;

    class Movie
    {
        private $posterPath;
        private $id;
        private $title;
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

        public function getTitle()
        {
                return $this->title;
        }

        public function setTitle($title)
        {
                $this->title = $title;

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