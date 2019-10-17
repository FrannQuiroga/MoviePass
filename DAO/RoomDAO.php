<?php
    namespace DAO;

    use \Exception as Exception;
    //use DAO\IRoomDAO as IRoomDAO;
    use Models\Room as Room;    
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
                $parameters["cinema_id"] = $room->getIdCinema();
                
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
                $roomList = array();

                $query = "SELECT * FROM .$this->tableName WHERE isAvailable = 1 ORDER BY ". $orderedBy;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $room = new Room();
                    $room->setId($row["id"]);
                    $room->setName($row["name"]);
                    $room->setCapacity($row["capacity"]);
                    $room->setIdCinema($row["cinema_id"]);
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