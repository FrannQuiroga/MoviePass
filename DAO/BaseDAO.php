<?php
    namespace DAO;

    use \Exception as Exception;
    use Models\Function_ as Function_;
    use Models\Room as Room;
    use Models\Movie as Movie; 
    use Models\Cinema as Cinema;
    use Models\User as User;
    use Models\UserProfile as UserProfile;
    use Models\Ticket as Ticket;  
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
        public function GetCinema($idCinema) //get a cinema complete object by id
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
        public function GetRoom($idRoom) //get a room complete object by id
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
        public function GetFunction($idFunction) //get a function complete object by id
        {
            try
            {
                $query = "SELECT * FROM functions WHERE isAvailable = 1 AND id =" .$idFunction;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $function = new Function_();
                    $function->setId($row["id"]);
                    $function->setDay($row["day"]);
                    $function->setTime($row["time"]);
                    $function->setRoom($this->GetRoom($row["room_id"])); 
                    $function->setMovie($this->GetMovie($row["movie_id"]));
                }

                return $function;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetFunctionsByMovie($movie) //get all the functions that a movie have in every cinema
        
        //Order by cinema --> room --> day --> time
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

        public function UpdateFunctions() //Updates the functions db regarding the current date
        {
            try
            {
                $query = "UPDATE functions SET  isAvailable = 0 where day < CURRENT_DATE";
                
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        //USER!!
        public function GetUser($idUser) //get user complete object by id
        {
            try
            {
                $user= null;
                

                $query = "SELECT * FROM users WHERE id = " .$idUser." AND isAvailable = 1";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
        
                foreach($resultSet as $row)
                {                
                    $user = new User();
                    $user->setId($row["id"]);
                    $user->setEmail($row["email"]);
                    $user->setPassword($row["password"]);
                    $user->setIsAdmin($row["isAdmin"]);

                    $user->setUserProfile($this->GetProfile($row["user_profile_id"]));
                }
                return $user;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetProfile($idProfile) //get user profile by id
        {
            try
            {
                $userProfile = null;
                $query = "SELECT * FROM user_profiles WHERE id = " .$idProfile;
                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach($resultSet as $row)
                {
                    $userProfile = new UserProfile();
                    $userProfile->setId($row["id"]);
                    $userProfile->setName($row["name"]);
                    $userProfile->setSurname($row["surname"]);
                    $userProfile->setDocument($row["document"]);
                }

                return $userProfile;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetBuyTickets($user) //function to get the buy tickets per user.
        {
            try
            {
                $ticketList = array();

                $query = "select t.id,t.seat_number,t.function_id,t.user_id from tickets t
                            inner join functions f on t.function_id = f.id
                            inner join movies m on f.movie_id = m.id
                            where f.isAvailable = 1 AND m.isAvailable = 1 AND t.user_id = ".$user->getId().
                            " order by f.day, f.time";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach($resultSet as $row)
                {
                    $ticket = new Ticket();
                    $ticket->setId($row["id"]);
                    $ticket->setSeatNumber($row["seat_number"]);
                    $ticket->setFunction($this->GetFunction($row["function_id"]));
                    $ticket->setUser($this->GetUser($row["user_id"]));

                    array_push($ticketList, $ticket);
                }

                return $ticketList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function getAvailableTickets($function)
        {
            try
            {
                

                $query = "SELECT count(*) FROM tickets 
                            WHERE user_id = 0 AND function_id = ".$function->getId(). 
                            " group by function_id";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);

                foreach($resultSet as $row)
                {
                    return $row[0];
                }
                    return 0;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
        
    }
?>