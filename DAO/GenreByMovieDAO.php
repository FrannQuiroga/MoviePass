<?php
    namespace DAO;

    use \Exception as Exception;
    
    use Models\GenreByMovie as GenreByMovie;
    use DAO\Connection as Connection;

    class GenreByMovieDAO
    {
        private $connection;
        private $tableName = "genre_by_movie";

        public function Add(GenreByMovie $genreByMovie)
        {
            try
            {

                $query = "INSERT INTO ".$this->tableName. "(genre_id,movie_id) VALUES (:genre_id,:movie_id);";

                $parameters["genre_id"] = $genreByMovie->getGenreId();
                $parameters["movie_id"] = $genreByMovie->getMovieId();
                
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Truncate()
        {
            try
            {
                $query = "TRUNCATE ".$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
            }
            catch(Exception $ex)
            {
                //throw $ex;
            }

        }

        public function Get()
        {
            try
            {
                $genreByMovieList = array();

                $query = "SELECT * FROM ".$this->tableName ;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $genreByMovie = new GenreByMovie();
                    
                    $genreByMovie->setGenreId($row["genre_id"]);
                    $genreByMovie->setMovie($row["movie_id"]);

                    array_push($genreByMovieList, $genreByMovie);
                }

                return $genreByMovieList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>