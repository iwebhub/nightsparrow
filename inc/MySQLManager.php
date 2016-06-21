<?php

class MySQLManager
{

    function __construct()
    {
        include 'ErrorHandler.php';
        $handler = new ErrorHandler;
    }

    /** javna funkcija za spajanje na mysqli bazu **/
    public function mysqliConnect()
    {
        $dbconn = new mysqli(mysql_server, mysql_user, mysql_password, mysql_database);
        if ($dbconn->connect_error) {
            $handler->throwError(0x010010);

        }

        return $dbconn;
    }


}