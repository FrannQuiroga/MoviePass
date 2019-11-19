<?php
    namespace DAO;

    use \Exception as Exception;
    use DAO\ITicketDAO as ITicketDAO;
    use Models\Ticket as Ticket; 
    use DAO\Connection as Connection;
    use DAO\BaseDAO as BaseDAO;

    class ticketDAO extends BaseDAO implements ITicketDAO
    {
        private $connection;
        private $tableName = "tickets";

        public function Add(Ticket $ticket)
        {
            try
            {

                $query = "INSERT INTO ".$this->tableName." (seat_number,function_id) VALUES (:seat_number,:function_id);";
                
                $parameters["seat_number"] = $ticket->getSeatNumber();
                $parameters["function_id"] = $ticket->getFunction()->getId();
                
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }

        public function Get($function)
        {
            try
            {
                $ticketList = array();

                $query= "select * from ".$this->tableName." t
                            inner join functions f on t.function_id = f.id 
                            where f.isAvailable = 1 AND f.id = ".$function->getId().
                            " order by t.seat_number";

                $this->connection = Connection::GetInstance();

                $resultSet = $this->connection->Execute($query);
                
                foreach ($resultSet as $row)
                {    
                    
                    $ticket = new Ticket();
                    $ticket->setId($row["id"]);
                    $ticket->setSeatNumber($row["seat_number"]);
                    $ticket->setFunction($this->GetFunction($row["function_id"]));
                    if($row["user_id"] == 0)
                    {
                        $ticket->setUser(null);
                    }
                    else
                    {
                        $ticket->setUser($this->getUser($row["user_id"]));
                    }
                    
                    array_push($ticketList, $ticket);
                }
                return $ticketList;
            }
            catch(Exception $ex)
            {
                throw $ex;
            }
        }
    }
?>