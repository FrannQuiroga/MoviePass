<?php
    namespace DAO;

    use \Exception as Exception;
    use Models\Function_ as Function_;
    //use Models\Room as Room;
    //use Models\Movie as Movie;   
    use DAO\Connection as Connection;
    use DAO\BaseDAO as BaseDAO;
    use DAO\IFunctionDAO as IFunctionDAO;

    class FunctionDAO extends BaseDAO implements IFunctionDAO
    {
        private $connection;
        private $tableName = "functions"; 

        public function Add(Function_ $function)
        {
            try
            {

                $query = "INSERT INTO ".$this->tableName." (day,time,movie_id,room_id) VALUES (:day,:time,:movie_id, :room_id);";
                
                //$parameters["day"] = date( 'Ymd H:i:s', $function->getDay());
                //var_dump($function->getDay());
                $parameters["day"] = $function->getDay();
                $parameters["time"] = $function->getTime();
                $parameters["movie_id"] = $function->getMovie()->getId();
                $parameters["room_id"] = $function->getRoom()->getId();
                
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Get($room)
        {
            try
            {
                $functionList = array();

                $query = "SELECT * FROM ". $this->tableName.
                " WHERE isAvailable = 1 AND room_id =" .$room->getId(). 
                 " ORDER BY day,time";//ORDENO POR DIA Y HORARIO (en ese orden).

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $function = new Function_();
                    $function->setId($row["id"]);
                    $function->setDay($row["day"]);
                    $function->setTime($row["time"]);
                    $function->setRoom($room);
                    $function->setMovie($this->GetMovie($row["movie_id"]));

                    array_push($functionList, $function);
                }
                return $functionList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function ExistsFunction($day,$time,$idRoom)
        {
            try
            {

                $query = "SELECT * FROM ". $this->tableName.
                " WHERE isAvailable = 1 AND day LIKE '%" .$day. "%' AND time LIKE '%" .$time. "%' AND room_id = " .$idRoom;
                
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

        public function Edit($function)
        {
            try
            {
                $query = "UPDATE " .$this->tableName." SET  day = '".$function->getDay()."', time = '".$function->getTime()."', movie_id = ".$function->getMovie()->getId()." where id=" .$function->getId();
                
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Remove($idFunction)
        {
            try
            {
                $query = "UPDATE .$this->tableName SET isAvailable = 0 WHERE id =".$idFunction;

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