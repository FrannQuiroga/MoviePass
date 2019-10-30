<?php
    namespace DAO;

    use \Exception as Exception;
    use Models\Function_ as Function_;
    use Models\Room as Room;
    use Models\Movie as Movie;    
    use DAO\Connection as Connection;

    class FunctionDAO
    {
        private $connection;
        private $tableName = "functions";

        public function Add(Function_ $function)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (day,time,movie_id,room_id) VALUES (:day,:time,:movie_id, :room_id);";
                
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
                 " ORDER BY day";//VER CON QUE ORDENAMOS; DAY ESTA FORZADO.

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $function = new Function_();
                    $function->setId($row["id"]);
                    $function->setDay($row["day"]);
                    $function->setTime($row["time"]);
                    $function->setRoom($room);
                    
                    $movie = new Movie();
                    $movie->setId($row["movie_id"]);
                    $function->setMovie($movie);

                    array_push($functionList, $function);
                }
                return $functionList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function remove($id)
        {
            
        }
    }
?>