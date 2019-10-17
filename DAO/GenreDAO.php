<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IGenreDAO as IGenreDAO;
    use Models\Genre as Genre;    
    use DAO\Connection as Connection;

    class GenreDAO implements IGenreDAO
    {
        private $connection;
        private $tableName = "genres";

        public function Add(Genre $genre)
        {
            try
            {

                $query = "INSERT INTO ".$this->tableName." (id,name) VALUES (:id,:name);";

                $parameters["id"] = $genre->getId();
                $parameters["name"] = $genre->getName();
                
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

        public function Get($orderedBy)
        {
            try
            {
                $genreList = array();

                $query = "SELECT * FROM .$this->tableName ORDER BY " .$orderedBy;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $genre = new Genre();
                    
                    $genre->setId($row["id"]);
                    $genre->setName($row["name"]);

                    array_push($genreList, $genre);
                }

                return $genreList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>