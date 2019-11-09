<?php 
    namespace DAO;

    use Models\Room as Room;

    interface IRoomDAO{
        
        public function Add(Room $room);
        public function Get($cinema,$orderedBy);
        public function Remove($idRoom);
        public function Edit($room);
    }

?>