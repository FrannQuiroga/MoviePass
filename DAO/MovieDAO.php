<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IMovieDAO as IMovieDAO;
    use Models\Movie as Movie;    
    use DAO\Connection as Connection;

    class MovieDAO implements IMovieDAO
    {
        private $connection;
        private $tableName = "movies";

        public function Add(Movie $movie)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (id,poster_path,title,vote_average,overview) VALUES (:id,:poster_path,:title,:vote_average,:overview);";

                $parameters["id"] = $movie->getId();
                $parameters["poster_path"] = $movie->getPosterPath();
                $parameters["title"] = $movie->getTitle();
                $parameters["vote_average"] = $movie->getVoteAverage();
                $parameters["overview"] = $movie->getOverview();
                
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
                $movieList = array();

                $query = "SELECT * FROM ".$this->tableName." ORDER BY ".$orderedBy;

                
                /*$query = "SELECT m.id, m.original_title, m.poster_path, m.vote_average, m.overview, g.name as genre_ids
                FROM genre_by_movie as gbm
                INNER JOIN movies as m on gbm.movie_id = m.id
                INNER JOIN genres as g on g.id = gbm.genre_id
                ORDER BY ".$orderedBy;*/
                

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

        public function GetSearchList($searched) //NO SE POR QUE PORONGA NO ANDA!!
        {
            try
            {
                $searchList = array();

                $query = "SELECT * FROM .$this->tableName. WHERE title =" .$searched;
                

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

        public function GetMovie($id) /*FALTA PROBAR FUNCION!!*/ 
        {
            try
            {
                $movie= null;

                $query = "SELECT * FROM .$this->tableName. WHERE id =".$id;

                
                /*$query = "SELECT m.id, m.original_title, m.poster_path, m.vote_average, m.overview, g.name as genre_ids
                FROM genre_by_movie as gbm
                INNER JOIN movies as m on gbm.movie_id = m.id
                INNER JOIN genres as g on g.id = gbm.genre_id
                ORDER BY ".$orderedBy;*/
                

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
                    //funcion auxiliar para cargar los generos de la pelicula a un arreglo
                    $movie->setGenres($this->GetGenreListByMovie($movie->getId()));

                    array_push($movieList, $movie);
                }

                return $movie;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetGenreListByMovie($id)
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
        }
    }
?>