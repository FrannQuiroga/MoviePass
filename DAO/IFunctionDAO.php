<?php 
    namespace DAO;

    use Models\Function_ as Function_;

    interface IFunctionDAO{
        
        public function Add(Function_ $function);
        public function Get($room);
        public function ExistsFunction($day,$time,$idRoom);
        public function Remove($idFunction);
        public function Edit($function);
    }

?>