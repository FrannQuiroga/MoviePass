<?php
    namespace DAO;

    use \Exception as Exception;
    //use DAO\IUserDAO as IUserDAO;
    use Models\User as User;   
    use DAO\Connection as Connection;
    use DAO\UserProfileDAO as UserProfileDAO;

    class UserDAO /*implements IUserDAO*/
    {
        private $connection;
        private $tableName = "users";

        public function Add(User $user)
        {
            try
            {

                $query = "INSERT INTO ".$this->tableName." (email,password,userProfile_id) VALUES (:email,:password,:userProfile_id);";
                
                $parameters["email"] = $user->getEmail();
                $parameters["password"] = $user->getPassword();
                $parameters["userProfile_id"]=$user->getUserProfile()->getId();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetUser($email,$password)
        {
            try
            {
                $userList = array();
                $userProfileDAO=new UserProfileDAO();

                $query = "SELECT * FROM $this->tableName WHERE email = '".$email."' AND  password= '".$password."'";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $user = new User();
                    $user->setId($row["id"]);
                    $user->setEmail($row["email"]);
                    $user->setPassword($row["password"]);
                    $user->setUserProfile($userProfileDAO->GetById($row["userProfile_id"]));//pasar el objeto
                    $user->setIsAdmin($row["isAdmin"]);
                    $user->setIsAvailable($row["isAvailable"]);
                    array_push($userList, $user);
                }
                return $userList;
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
                $userProfileDAO=new UserProfileDAO();

                $query = "SELECT * FROM .$this->tableName WHERE isAvailable = 1 ORDER BY ". $orderedBy;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $user = new User();
                    $user->setId($row["id"]);
                    $user->setEmail($row["email"]);
                    $user->setPassword($row["password"]);
                    $user->setUserProfile($userProfileDAO->GetById($row["userProfile_id"]));//pasar el objeto
                    $user->setIsAdmin($row["isAdmin"]);
                    $user->setIsAvailable($row["isAvailable"]);
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
    }
?>
