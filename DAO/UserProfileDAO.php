<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\IUserProfileDAO as IUserProfileDAO;
    use Models\UserProfile as UserProfile;    
    use DAO\Connection as Connection;

    class UserProfileDAO implements IUserProfileDAO
    {
        private $connection;
        private $tableName = "userProfiles";

        public function Add(UserProfile $userProfile)
        {
            try
            {
                $query = "INSERT INTO ".$this->tableName." (name,surname,document) VALUES (:name,:surname,:document);";
                
                $parameters["name"] = $userProfile->getName();
                $parameters["surname"] = $userProfile->getSurname();
                $parameters["document"] = $userProfile->getDocument();
    
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Get()
        {
            try
            {
                $userProfileList = array();

                $query = "SELECT * FROM" .$this->tableName;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $userProfile = new UserProfile();
                    $userProfile->setId($row["id"]);
                    $userProfile->setName($row["name"]);
                    $userProfile->setSurname($row["surname"]);
                    $userProfile->setDocument($row["document"]);

                    array_push($userProfileList, $userProfile);
                }
                return $userProfileList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function GetByDocument($document)
        {
            try
            {
                $userProfile= null;

                $query = "SELECT * FROM ".$this->tableName." WHERE document =".$document;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $userProfile=new UserProfile();
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

        public function GetById($id){
            try
            {
                $userProfile= null;

                $query = "SELECT * FROM ".$this->tableName." WHERE id =".$id;

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {                
                    $userProfile=new UserProfile();
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

        public function remove($id)
        {
            try
            {
                $query = "DELETE FROM .$this->tableName WHERE id =".$id;

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