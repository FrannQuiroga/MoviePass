<?php
    namespace DAO;

    use \Exception as Exception;
    use Models\Function as Function;    
    use DAO\Connection as Connection;

    class FunctionDAO
    {
        private $connection;
        private $tableName = "functions";

        public function Add(Function $function)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (day, time,movie_id,cinema_id) VALUES (:day, :time,:movie_id, :cinema_id);";
                
                $parameters["day"] = $function->getDay();
                $parameters["time"] = $function->getTime();
                $parameters["movie_id"] = ($function->getMovie())->getId();
                $parameters["cinema_id"] = ($function->getCinema())->getId();
                
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Get()
        {
            try
            {
                $functionList = array();

                $query = "SELECT * FROM . $this->tableName";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $function = new function();
                    $function->setId($row["id"]);
                    $function->setDay($row["day"]);
                    $function->setTime($row["time"]);

                    //traigo la pelicula de la bd  
                    $query = "SELECT * FROM .'movies'. WHERE id =".$row["movie_id"];
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