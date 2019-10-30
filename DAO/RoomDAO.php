<?php
    namespace DAO;

    use \Exception as Exception;
    //use DAO\IRoomDAO as IRoomDAO;
    use Models\Room as Room;
    use Models\Cinema as Cinema; 
    use DAO\Connection as Connection;

    class RoomDAO /*implements IRoomDAO*/
    {
        private $connection;
        private $tableName = "rooms";

        public function Add(Room $room)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (name, capacity,cinema_id) VALUES (:name, :capacity, :cinema_id);";
                
                $parameters["name"] = $room->getName();
                $parameters["capacity"] = $room->getCapacity();
                $parameters["cinema_id"] = $room->getCinema()->getId();
                
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Get($orderedBy,$cinema)
        {
            try
            {
                $roomList = array();

                $query = "SELECT * FROM ".$this->tableName. 
                " WHERE isAvailable = 1 AND cinema_id =".$cinema->getId(). 
                 " ORDER BY ". $orderedBy;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $room = new Room();
                    $room->setId($row["id"]);
                    $room->setName($row["name"]);
                    $room->setCapacity($row["capacity"]);
                    $room->setCinema($cinema);
                    $room->setIsAvailable($row["isAvailable"]);

                    array_push($roomList, $room);
                }
                return $roomList;
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

                $query = "SELECT * FROM ".$this->tableName." WHERE isAvailable = 1 AND id =".$id;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $room = new Room();
                    $room->setId($row["id"]);
                    $room->setName($row["name"]);
                    $room->setCapacity($row["capacity"]);
                    $cinema = new Cinema();
                    $cinema->setId($row["cinema_id"]);
                    $room->setCinema($cinema);
                }
                return $room;
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