<?php
    namespace DAO;

    use \Exception as Exception;
    //use DAO\ITicketDAO as ITicketDAO;
    use Models\Ticket as Ticket; 
    use DAO\Connection as Connection;
    use DAO\BaseDAO as BaseDAO;

    class TicketDAO extends BaseDAO /*implements IRoomDAO*/
    {
        private $connection;
        private $tableName = "tickets";

        //FALTAN METODOS
    }
?>