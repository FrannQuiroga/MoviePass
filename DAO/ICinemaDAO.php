<?php 
    namespace DAO;

    use Models\Cinema as Cinema;

    interface ICinemaDAO{
        
        public function Add(Cinema $cinema);
        public function Get($orderedBy);
        public function GetById($id);
        public function remove($id);
    }

?>