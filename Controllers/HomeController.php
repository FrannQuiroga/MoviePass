<?php
    namespace Controllers;

    class HomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."home.php");
            
        } 
        
        public function AboutUs()// NO SE SI SE PUEDE!!!
        {
            require_once(VIEWS_PATH."about-us.php");
        }
    }
?>