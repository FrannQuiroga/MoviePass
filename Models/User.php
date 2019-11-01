<?php
    namespace Models;

    class User
    {
        private $id;
        private $email;
        private $password;
        private $userProfile; //agregado objeto  
        private $isAdmin; //ROLE. 1=Admin; 0=Common User

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
            return $this;
        }

        public function getEmail()
        {
            return $this->email;
        }

        public function setEmail($email)
        {
            $this->email = $email;
            return $this;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
            return $this;
        }

        public function getUserProfile()
        {
                return $this->userProfile;
        }

        public function setUserProfile($userProfile)
        {
                $this->userProfile = $userProfile;

                return $this;
        }

        public function getIsAdmin()
        {
                return $this->isAdmin;
        }

        public function setIsAdmin($isAdmin)
        {
                $this->isAdmin = $isAdmin;

                return $this;
        }
    }
?>