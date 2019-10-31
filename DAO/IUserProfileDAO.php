<?php 
    namespace DAO;

    use Models\UserProfile as UserProfile;

    interface IUserProfileDAO{
        
        public function Add(UserProfile $userProfile);
        public function Get();
        public function GetById($id);
        public function remove($id);
    }

?>