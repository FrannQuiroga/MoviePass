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
                 " ORDER BY day";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $function = new Function_();
                    $function->setId($row["id"]);
                    $function->setDay($row["day"]);
                    $function->setTime($row["time"]);

                    //traigo la pelicula de la bd  
                    $query = "SELECT * FROM movies WHERE id =".$row["movie_id"];
                    $this->connection = Connection::GetInstance();
                    $resultSet = $this->connection->Execute($query);
                    $movie =new Movie();
                    $movie->setId($resultSet["id"]);
                    $movie->setPosterPath($resultSet["poster_path"]);
                    $movie->setOriginalTitle($resultSet["original_title"]);
                    $movie->setVoteAverage($resultSet["vote_average"]);
                    $movie->setOverview($resultSet["overview"]);
                    $movie->setGenres($movie->GetGenreListByMovie($movie->getId()));
                    
                    $function->setMovie($movie);

                    //traigo el cine de la bd  
                    $function->setCine($row["cinema_id"]);



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