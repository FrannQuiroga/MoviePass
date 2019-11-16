<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\ICinemaDAO as ICinemaDAO;
    use Models\Cinema as Cinema;    
    use DAO\Connection as Connection;
    use DAO\BaseDAO as BaseDAO;

    class CinemaDAO extends BaseDAO implements ICinemaDAO
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

                $query = "SELECT * FROM ".$this->tableName." WHERE isAvailable = 1 ORDER BY ". $orderedBy;

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

                    array_push($cinemaList, $cinema);
                }
                return $cinemaList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Remove($idCinema)
        {
            try
            {
                $query = "UPDATE .$this->tableName SET isAvailable = 0 WHERE id =".$idCinema;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Edit($cinema)
        {
            try
            {
                $query = "UPDATE " .$this->tableName." SET name = '".$cinema->getName()."' , capacity = ".$cinema->getCapacity(). ", address = '".$cinema->getAddress(). "', price =" .$cinema->getPrice(). " where id=" .$cinema->getId();
                
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function ExistsCinemaName($name)
        {
            try
            {

                $query = "SELECT * FROM ". $this->tableName.
                " WHERE isAvailable = 1 AND name LIKE '%" .$name. "'";
                
                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                if(empty($resultSet))
                    return false;

                return true;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>
