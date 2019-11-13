<?php
    namespace DAO;

    use \Exception as Exception;
    use Models\Function_ as Function_;
    use Models\Room as Room;
    use Models\Movie as Movie; 
    use Models\Cinema as Cinema;  
    use DAO\Connection as Connection;
    use DAO\IBaseDAO as IBaseDAO;

    abstract class BaseDAO implements IBaseDAO 
    {
        private $connection;

        //BASE DE LA QUE HEREDAN LOS DAO PARA COMPARTIR FUNCIONALIDADES QUE NECESITO EN TODOS!!
        //GetById de cada una para poder ir completando los objetos necesarios

        //MOVIE!!
        public function GetMovie($idMovie) //DEVUELVE UNA PELICULA COMPLETA CON TODOS SUS GENEROS (OBJETO)
        {
            try
            {

                $query = "SELECT * FROM movies WHERE id =".$idMovie;
                
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
        }

        public function GetGenreListByMovie($idMovie) //LISTA DE GENEROS POR PELICULA
        {
            try
            {
                $genreList = array();

                $query = "SELECT g.name 
                FROM  genre_by_movie as gbm 
                INNER JOIN genres as g on g.id = gbm.genre_id
                WHERE gbm.movie_id =".$idMovie;

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

        //CINEMA!!
        public function GetCinema($idCinema) //DEVUELVE EL CINE COMPLETO (OBJETO)
        {
            try
            {
                $cinema= null;

                $query = "SELECT * FROM cinemas WHERE isAvailable = 1 AND id =".$idCinema;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $cinema = new Cinema();
                    $cinema->setId($row["id"]);
                    $cinema->setName($row["name"]);
                    $cinema->setCapacity($row["capacity"]);
                    $cinema->setAddress($row["address"]);
                    $cinema->setPrice($row["price"]);
                }
                return $cinema;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        //ROOM
        public function GetRoom($idRoom) //DEVUELVE EL OBJETO ENTERO YA CON EL CINE!!
        {
            try
            {

                $query = "SELECT * FROM rooms WHERE isAvailable = 1 AND id =".$idRoom;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $room = new Room();
                    $room->setId($row["id"]);
                    $room->setName($row["name"]);
                    $room->setCapacity($row["capacity"]);
                    $room->setCinema($this->GetCinema($row["cinema_id"]));
                }
                return $room;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        //FUNCTION
        public function GetFunction($idFunction)//DEVUELVE LA FUNCION COMPLETA, CON OBJ MOVIE Y ROOM(CON CINE DENTRO).
        {
            try
            {
                $functionList = array();

                $query = "SELECT * FROM functions WHERE isAvailable = 1 AND id =" .$idFunction;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $function = new Function_();
                    $function->setId($row["id"]);
                    $function->setDay($row["day"]);
                    $function->setTime($row["time"]);
                    $function->setRoom($this->GetRoom($row["room_id"])); //DE BASEDAO!!
                    $function->setMovie($this->GetMovie($row["movie_id"])); //DE BASEDAO!!
                }

                return $function;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        //AGREGO ACA PARA PROBAR!!
        public function GetFunctionsByMovie($movie)
        //Todas las funciones de la pelicula en todos los cines!!
        //Ordenado por cine --> sala --> dia --> hora (en ese orden)
        {
            try
            {
                $functionList = array();
                
                $query = "SELECT f.id,f.day,f.time,f.movie_id,f.room_id FROM functions f
                          INNER JOIN movies m on f.movie_id = m.id
                          INNER JOIN rooms r on f.room_id = r.id 
                          INNER JOIN cinemas c on r.cinema_id = c.id
                          WHERE f.isAvailable = 1 AND m.isAvailable = 1 AND movie_id =" .$movie->getId().
                          " ORDER BY c.name,r.name,f.day,f.time;";
                    //TIENEN QUE ESTAR VIGENTES TANTO LA FUNCION COMO LA PELICULA EN BD!!

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $function = new Function_();
                    $function->setId($row["id"]);
                    $function->setDay($row["day"]);
                    $function->setTime($row["time"]);
                    $function->setMovie($movie);
                    $function->setRoom($this->GetRoom($row["room_id"]));

                    array_push($functionList, $function);
                }
                return $functionList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        
    }
?>