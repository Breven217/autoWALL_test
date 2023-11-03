<?php

class DB {
    private const SERVERNAME = "localhost";
    private const USERNAME = "root";
    private const PASSWORD = "";
    private const DBNAME = "autowall";

    /**
     * Executes a SQL query and returns the result
     *
     * @param string $sql
     * @param array $params
     * @return array|boolean
     */
    public static function query(string $sql, array $params = []): mixed
    {
        $connection = new mysqli(DB::SERVERNAME, DB::USERNAME, DB::PASSWORD, DB::DBNAME); 
            
        if ($connection -> connect_errno) 
        { 
            throw new Exception("". $connection -> connect_error);
        } 

        $stmt = $connection->prepare($sql);
        $stmt -> execute($params);
        $result = $stmt->get_result();
        $affectedRows = mysqli_affected_rows($connection);
        $connection->close();

        // If the query is an update, return true if any rows were affected
        if (strpos($sql, 'UPDATE') !== false){
            return $affectedRows > 0;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}

?>