<?php

namespace app\core;

use app\config\Config;
use PDO;
use PDOStatement;

class Database extends PDO
{
    // Database configuration
    private $DB_NAME = Config::DB_NAME;
    private $DB_USER = Config::DB_USER;
    private $DB_PASSWORD = Config::DB_PASSWORD;
    private $DB_HOST = Config::DB_HOST;
    private $DB_PORT = Config::DB_PORT;

    // Stores the connection
    private $conn;

    public function __construct()
    {
        // When this class is instantiated, the $conn variable is assigned the database connection
        $this->conn = new PDO(
            "pgsql:dbname=$this->DB_NAME;
            host=$this->DB_HOST;
            port=$this->DB_PORT;
            user=$this->DB_USER;
            password=$this->DB_PASSWORD"
        );
    }

    /**
     * This method receives an object with the 'prepared' query and assigns the keys of the query
     * their respective values.
     * @param  PDOStatement  $stmt   Contains the already 'prepared' query.
     * @param  string        $key    Same key as specified in the query.
     * @param  string        $value  Value of a specific key.
     */
    private function setParameters($stmt, $key, $value)
    {
        $stmt->bindParam($key, $value);
    }

    /**
     * The responsibility of this method is simply to iterate over the array with the parameters
     * obtaining the keys and values to provide such data to setParameters().
     * @param  PDOStatement  $stmt         Contains the already 'prepared' query.
     * @param  array         $parameters   Associative array containing keys and values to supply the query
     */
    private function mountQuery($stmt, $parameters)
    {
        foreach ($parameters as $key => $value) {
            $this->setParameters($stmt, $key, $value);
        }
    }

    /**
     * This method is responsible for receiving the query and parameters, preparing the query
     * to receive the values of the specified parameters, calling the mountQuery method,
     * executing the query, and returning to the calling methods to handle the result.
     * @param  string   $query       SQL statement to be executed in the database.
     * @param  array    $parameters  Associative array containing the keys specified in the query and their respective values
     *
     * @return PDOStatement
     */
    public function executeQuery($query, array $parameters = [])
    {
        $stmt = $this->conn->prepare($query);
        $this->mountQuery($stmt, $parameters);
        $stmt->execute();
        return $stmt;
    }
}
