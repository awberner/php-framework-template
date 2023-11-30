<?php

namespace app\models;

use app\core\Database;
use PDO;

class Users
{
    /** We could have attributes here */

    /**
     * This method retrieves all users stored in the database.
     *
     * @return array
     */
    public static function findAll()
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM users');
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * This method retrieves a user stored in the database with a
     * specific ID.
     * @param int $id Unique identifier of the user
     *
     * @return array
     */
    public static function findById($id)
    {
        $conn = new Database();
        $result = $conn->executeQuery('SELECT * FROM users WHERE id = :ID LIMIT 1', array(
            ':ID' => $id
        ));

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

}
