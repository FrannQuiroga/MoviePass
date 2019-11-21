<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IRoomDAO as IRoomDAO;
    use Models\Room as Room; 
    use DAO\Connection as Connection;
    use DAO\BaseDAO as BaseDAO;

    class RoomDAO extends BaseDAO implements IRoomDAO
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

        public function Get($cinema,$orderedBy)
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

        

        public function Remove($idRoom)
        {
            try
            {
                $query = "UPDATE .$this->tableName SET isAvailable = 0 WHERE id =".$idRoom;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Edit($room){
            try
            {
                $query = "UPDATE " .$this->tableName." SET  name = '".$room->getName()."' , capacity = ".$room->getCapacity(). " where id=" .$room->getId();
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function ExistsRoomName($name,$idCinema)//To verify that the cinema doesn´t have another room with this name
        {
            try
            {

                $query = "SELECT * FROM ". $this->tableName.
                " WHERE isAvailable = 1 AND cinema_id = ".$idCinema." AND name LIKE '%" .$name. "'";
                
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

        public function EditableRoom($name,$idCinema,$idRoom)//To verify that the cinema doesn´t have another room with this name
        {
            try
            {

                $query = "SELECT * FROM ". $this->tableName.
                " WHERE isAvailable = 1 AND cinema_id = ".$idCinema." AND name LIKE '%" .$name. "' AND NOT id =".$idRoom;
                
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