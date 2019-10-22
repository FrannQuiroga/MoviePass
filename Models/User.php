<?php
    namespace Models;

    class User
    {
        private $id;
        private $email;
        private $password;
        private $name;
        private $surname;
        private $document;
        private $isAdmin;
        private $isAvailable;

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

        public function getName()
        {
            return $this->name;
        }

        public function setName($name)
        {
            $this->name = $name;
            return $this;
        }
 
        public function getSurname()
        {
            return $this->surname;
        }

        public function setSurname($surname)
        {
            $this->surname = $surname;
            return $this;
        }

        public function getDocument()
        {
            return $this->document;
        }

        public function setDocument($document)
        {
            $this->document = $document;
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

        public function getIsAvailable()
        {
            return $this->isAvailable;
        }

        public function setIsAvailable($isAvailable)
        {
            $this->isAvailable = $isAvailable;
            return $this;
        }
    }
?>