<?php 
    namespace DAO;

    interface IBaseDAO{
        
        //MOVIE
        public function GetMovie($idMovie);
        public function GetGenreListByMovie($idMovie);

        //CINEMA
        public function GetCinema($idCinema);

        //ROOM
        public function GetRoom($idRoom);

        //FUNCTION
        public function GetFunction($idFunction);

        //USER
        public function GetUser($idUser);
        public function GetProfile($idProfile);
        
    }

?>