<?php
    namespace Models;

    class User
    {
        private $id;
        private $email;
        private $password;
        private $profile;

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

        public function getProfile()
        {
            return $this->profile;
        }

        public function setProfile($profile)
        {
            $this->profile = $profile;
            return $this;
        }
    }
?>