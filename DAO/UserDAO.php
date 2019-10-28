<?php
    namespace DAO;

    use \Exception as Exception;
    //use DAO\IUserDAO as IUserDAO;
    use Models\User as User;    
    use DAO\Connection as Connection;

    class UserDAO /*implements IUserDAO*/
    {
        private $connection;
        private $tableName = "users";

        public function Add(User $user)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (name,surname,document,email,password) VALUES (:name,:surname,:document,:email,:password);";
                
                $parameters["name"] = $user->getName();
                $parameters["surname"] = $user->getSurname();
                $parameters["document"] = $user->getDocument();
                $parameters["email"] = $user->getEmail();
                $parameters["password"] = $user->getPassword();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Get($orderedBy)
        {
            try
            {
                $userList = array();

                $query = "SELECT * FROM .$this->tableName WHERE isAvailable = 1 ORDER BY ". $orderedBy;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $user = new User();
                    $user->setId($row["id"]);
                    $user->setEmail($row["email"]);
                    $user->setPassword($row["password"]);
                    $user->setName($row["name"]);
                    $user->setSurname($row["surname"]);
                    $user->setDocument($row["document"]);
                    $user->setIsAdmin($row["isAdmin"]);

                    array_push($userList, $user);
                }
                return $userList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function remove($id)
        {
            try
            {
                $query = "UPDATE .$this->tableName SET isAvailable = 0 WHERE id =".$id;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetById($id)
        {
            try
            {
                $user= null;

                $query = "SELECT * FROM .$this->tableName WHERE id =".$id;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $user = new User();
                    $user->setId($row["id"]);
                    $user->setEmail($row["email"]);
                    $user->setPassword($row["password"]);
                    $user->setName($row["name"]);
                    $user->setSurname($row["surname"]);
                    $user->setDocument($row["document"]);
                    $user->setIsAdmin($row["isAdmin"]);
                    $user->setIsAvailable($row["isAvailable"]);
                }
                return $user;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function edit(User $user){

            try
            {
                $query = "UPDATE " .$this->tableName." SET  name = '".$user->getName()."' , surname = '".$user->getSurname(). "', document = '".$user->getDocument(). "', email ='" .$user->getEmail(). "', password = '".$user->getPassword()."', isAdmin = 0  where id=" .$user->getId();
                
                echo $query;
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }


        }
    }
?>
