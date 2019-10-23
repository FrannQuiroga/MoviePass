<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\ICinemaDAO as ICinemaDAO;
    use Models\Cinema as Cinema;    
    use DAO\Connection as Connection;

    class CinemaDAO implements ICinemaDAO
    {
        private $connection;
        private $tableName = "cinemas";

        public function Add(Cinema $cinema)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (name, capacity, address, price) VALUES (:name, :capacity, :address, :price);";
                
                $parameters["name"] = $cinema->getName();
                $parameters["capacity"] = $cinema->getCapacity();
                $parameters["address"] = $cinema->getAddress();
                $parameters["price"] = $cinema->getPrice();
                
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Get($orderedBy)
        {
            try
            {
                $cinemaList = array();

                $query = "SELECT * FROM .$this->tableName WHERE isAvailable = 1 ORDER BY ". $orderedBy;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $cinema = new Cinema();
                    $cinema->setId($row["id"]);
                    $cinema->setName($row["name"]);
                    $cinema->setCapacity($row["capacity"]);
                    $cinema->setAddress($row["address"]);
                    $cinema->setPrice($row["price"]);
                    $cinema->setIsAvailable($row["isAvailable"]);

                    array_push($cinemaList, $cinema);
                }
                return $cinemaList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetById($id)
        {
            try
            {
                $cinema= null;

                $query = "SELECT * FROM .$this->tableName WHERE isAvailable = 1 AND id =".$id;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $cinema = new Cinema();
                    $cinema->setId($row["id"]);
                    $cinema->setName($row["name"]);
                    $cinema->setCapacity($row["capacity"]);
                    $cinema->setAddress($row["address"]);
                    $cinema->setPrice($row["price"]);
                    $cinema->setIsAvailable($row["isAvailable"]);
                }
                return $cinema;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function remove($id)
        {
            try
            {
                $query = "UPDATE .$this->tableName SET isAvailable = 0 WHERE id =".$id;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>
