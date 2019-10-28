<?php 
    namespace DAO;

    use Models\Room as Room;

    interface IRoomDAO{
        
        public function Add(Rooom $room);
        public function Get($orderedBy,$cinema);
        public function GetById($id);
        public function remove($id);
    }

?>