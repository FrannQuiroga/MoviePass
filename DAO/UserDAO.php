<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IUserDAO as IUserDAO;
    use Models\User as User;
    use Models\UserProfile as UserProfile;
    use DAO\Connection as Connection;
    use DAO\BaseDAO as BaseDAO;

    class UserDAO extends BaseDAO implements IUserDAO
    {
        private $connection;
        private $tableName = "users";

        public function Add(User $user)
        {
            try
            {

                $query = "INSERT INTO ".$this->tableName." (email,password,user_profile_id) VALUES (:email,:password,:user_profile_id);";
                
                $parameters["email"] = $user->getEmail();
                $parameters["password"] = $user->getPassword();
                $parameters["user_profile_id"]=$user->getUserProfile()->getId();

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetByEmail($email)
        {
            try
            {
                $user= null;
                

                $query = "SELECT * FROM ".$this->tableName." WHERE email LIKE '%" .$email."' AND isAvailable = 1";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
        
                foreach($resultSet as $row)
                {                
                    $user = new User();
                    $user->setId($row["id"]);
                    $user->setEmail($row["email"]);
                    $user->setPassword($row["password"]);
                    $user->setIsAdmin($row["isAdmin"]);

                    //CONSULTA PARA TRAER EL USER PROFILE!!

                    $user->setUserProfile($this->GetProfile($row["user_profile_id"]));
                }
                return $user;
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
                    $user->setIsAdmin($row["isAdmin"]);

                    $user->setUserProfile($this->GetProfile($row["user_profile_id"]));

                    array_push($userList, $user);
                }
                return $userList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Remove($idUser)
        {
            try
            {
                $query = "UPDATE .$this->tableName SET isAvailable = 0 WHERE id =".$idUser;

                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function EditPassword($user)
        {
            try
            {
                $query = "UPDATE ".$this->tableName." SET password = '".$user->getPassword()."' WHERE id =".$user->getId();

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
