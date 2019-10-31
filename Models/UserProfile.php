<?php namespace Models;
    class UserProfile{
        
        private $id;
        private $name;
        private $surname;
        private $document;

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

        public function getId()
        {
                return $this->id;
        }

        public function setId($id)
        {
                $this->id = $id;

                return $this;
        }
    }
?>