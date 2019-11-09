<?php 
    namespace DAO;

    use Models\User as User;

    interface IUserDAO{
        
        public function Add(User $user);
        public function Get($orderedBy);
        public function GetByEmail($email);
        public function Remove($idRoom);

    }

?>