<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IMovieDAO as IMovieDAO;
    use Models\Movie as Movie;    
    use DAO\Connection as Connection;
    use DAO\BaseDAO as BaseDAO;

    class MovieDAO extends BaseDAO implements IMovieDAO
    {
        private $connection;
        private $tableName = "movies";

        public function Add(Movie $movie)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (id,poster_path,title,vote_average,overview,backdrop_path) VALUES (:id,:poster_path,:title,:vote_average,:overview,:backdrop_path);";

                $parameters["id"] = $movie->getId();
                $parameters["poster_path"] = $movie->getPosterPath();
                $parameters["title"] = $movie->getTitle();
                $parameters["vote_average"] = $movie->getVoteAverage();
                $parameters["overview"] = $movie->getOverview();
                $parameters["backdrop_path"] = $movie->getBackdropPath();
                
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Truncate() //ME PONE TODAS LAS PELIS COMO NO DISPONIBLES!!
        {
            try
            {
                $query = "UPDATE ".$this->tableName." SET isAvailable = 0";

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

        }

        public function EditMovie($idMovie) //ME ACTUVA NUEVAMENTE LA PELICULA, SI ES QUE YA ESTABA EN LA BD!!
        {
            try
            {
                $query = "UPDATE ".$this->tableName." SET isAvailable = 1 WHERE id = ".$idMovie;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }

        }

        public function Get($orderedBy) //La voy a dejar de usar, solo para saber que peliculas tengo disponibles. ACOMODAR!!
        {
            try
            {
                $movieList = array();

                $query = "SELECT * FROM ".$this->tableName." WHERE isAvailable = 1 ORDER BY ".$orderedBy;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $movie = new Movie();
                    
                    $movie->setId($row["id"]);
                    $movie->setPosterPath($row["poster_path"]);
                    $movie->setTitle($row["title"]);
                    $movie->setVoteAverage($row["vote_average"]);
                    $movie->setOverview($row["overview"]);
                    $movie->setBackdropPath($row["backdrop_path"]);
                    //funcion auxiliar para cargar los generos de la pelicula a un arreglo
                    $movie->setGenres($this->GetGenreListByMovie($movie->getId()));

                    array_push($movieList, $movie);
                }

                return $movieList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetSearchList($searched) //YA ESTA ANDANDO JOYA!!
        {
            try
            {
                $searchList = array();

                $query = "SELECT * FROM ".$this->tableName." WHERE title LIKE '%" .$searched."%';";
                
                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $movie = new Movie();
                    
                    $movie->setId($row["id"]);
                    $movie->setPosterPath($row["poster_path"]);
                    $movie->setTitle($row["title"]);
                    $movie->setVoteAverage($row["vote_average"]);
                    $movie->setOverview($row["overview"]);
                    $movie->setBackdropPath($row["backdrop_path"]);
                    //funcion auxiliar para cargar los generos de la pelicula a un arreglo
                    $movie->setGenres($this->GetGenreListByMovie($movie->getId()));

                    array_push($searchList, $movie);
                }
                return $searchList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        /*public function GetMovie($id) //EN BaseDAO
        {
            try
            {

                $query = "SELECT * FROM ".$this->tableName." WHERE id =".$id;              

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $movie = new Movie();
                    
                    $movie->setId($row["id"]);
                    $movie->setPosterPath($row["poster_path"]);
                    $movie->setTitle($row["title"]);
                    $movie->setVoteAverage($row["vote_average"]);
                    $movie->setOverview($row["overview"]);
                    $movie->setBackdropPath($row["backdrop_path"]);
                    //funcion auxiliar para cargar los generos de la pelicula a un arreglo
                    $movie->setGenres($this->GetGenreListByMovie($movie->getId()));
                }

                return $movie;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }*/

        public function ExistsMovie($idMovie) //TESTEADA!
        {
            try
            {

                $query = "SELECT * FROM ".$this->tableName." WHERE id =".$idMovie;
                
                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                if(!empty($resultSet)){
                    return true;}
                else{
                    return false;}
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        /*private function GetGenreListByMovie($id) //EN BaseDAO
        {
            try
            {
                $genreList = array();

                $query = "SELECT g.name 
                FROM  genre_by_movie as gbm 
                INNER JOIN genres as g on g.id = gbm.genre_id
                WHERE gbm.movie_id =".$id;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    array_push($genreList, $row["name"]);
                }

                return $genreList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }*/
    }
?>