<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IMovieDAO as IMovieDAO;
    use Models\Movie as Movie;    
    use DAO\Connection as Connection;
    use DAO\BaseDAO as BaseDAO;
    use Models\Function_ as Function_;

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

        /*public function GetSearchList($searched) //YA ESTA ANDANDO JOYA!!
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
        }*/

        public function GetSearchList($searched) //YA ESTA ANDANDO JOYA!!
        {
            try
            {
                $searchList = array();

                /*$query = "SELECT * FROM ".$this->tableName." WHERE title LIKE '%" .$searched."%';";*/
                $query = "SELECT m.id,m.poster_path,m.title,m.vote_average,m.overview,m.backdrop_path FROM functions f
                        INNER JOIN ".$this->tableName." m on m.id = f.movie_id
                        WHERE m.isAvailable = 1 AND f.isAvailable = 1 AND title LIKE '%".$searched."%'
                        GROUP BY m.id";
                
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

        public function GetPlayingList($orderedBy)
        {
            try
            {
                $playingList = array();
                if($orderedBy=="date"){
                    $query = "SELECT m.id,m.poster_path,m.title,m.vote_average,m.overview,m.backdrop_path FROM functions f
                        INNER JOIN ".$this->tableName." m on m.id = f.movie_id
                        WHERE m.isAvailable = 1 AND f.isAvailable = 1
                        GROUP BY m.id
                        ORDER BY f.".$orderedBy;
                }
                else { 
                $query = "SELECT m.id,m.poster_path,m.title,m.vote_average,m.overview,m.backdrop_path, g.name 
                         FROM functions f
                        
                        INNER JOIN ".$this->tableName." m	on m.id 		= f.movie_id
                        INNER JOIN genre_by_movie gxm 		on gxm.movie_id = m.id
                        INNER JOIN genres g 				on g.id 		= gxm.genre_id
                        
                        WHERE m.isAvailable = 1 AND f.isAvailable = 1
                        GROUP BY m.id
                        ORDER BY g.name";
                    }
                
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

                    array_push($playingList, $movie);
                }
                return $playingList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }


        

    }
?>