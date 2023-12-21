<?php

namespace App\Helpers;

/**
 * Provides a basic and low-level inteface with the database. 
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Helpers
 * @since      Class available since Release 1.0.1
 */
class DatabaseHelper
{

    protected $connection;

    function __construct()
    {
        $db = include __DIR__ . '/../Config/DatabaseConfig.php';

        try {
            $this->connection = new \mysqli(
                $db['server'],
                $db['username'],
                $db['password'],
                $db['database'],
                $db['port']
            );
        } catch (\mysqli_sql_exception $e) {
            // Log the error or handle it appropriately
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function __destruct()
    {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    public function getAllTables()
    {
        $query = "SHOW TABLES";
        $result = $this->query($query, false);

        $tables = [];

        foreach ($result as $row) {

            $tables[] = $row['Tables_in_' . 'modernfit'];
        }

        return $tables;
    }

    public function query($query, $associate = false, $params = [])
    {
        $statement = $this->connection->prepare($query);

        if (!$statement) {
            throw new \Exception($this->connection->error);
        }

        if (!empty($params)) {
            $types = str_repeat('s', count($params));
            $statement->bind_param($types, ...$params);
        }

        $statement->execute();

        $results = $statement->get_result();

        if ($associate) {
            $results = $results->fetch_assoc();
        } else {

            $results = $results->fetch_all(MYSQLI_ASSOC);
        }

        return $results;
    }

    //If these dont work i sincerely apologise - I'll rewrite them again back to how they used to be 
    public function create($table, $columns = [], $values = [])
    {
        // Get last object in database and get it's ID
        $statement = $this->connection->prepare("SELECT MAX(id) FROM " . $table);
        $statement->execute();

        $lastItem = $statement->get_result()->fetch_assoc()['MAX(id)'];

        // Inject id/created_at/updated_at into values string

        if (isset($values['id']) == false) {
            $values['id'] = $lastItem + 1;
        }

        $values['updated_at'] = date("Y-m-d H:i:s");
        $values['created_at'] = date("Y-m-d H:i:s");

        $values = array_merge(array_fill_keys($columns, null), $values);

        // Prepare columns and values string
        $columns = implode(', ', array_map(function ($col) {
            return "`$col`";
        }, $columns));

        $placeholders = implode(', ', array_fill(0, count($values), '?'));

        $prepare = "INSERT INTO " . $table . " (" . $columns . ") VALUES (" . $placeholders . ");";

        $statement = $this->connection->prepare($prepare);

        if (!$statement) {
            throw new \Exception($this->connection->error);
        }

        $statement->bind_param(str_repeat('s', count($values)), ...array_values($values));

        $statement->execute();

        return true;
    }

    public function read($table, $columns = "*", $query = null, $associate = false)
    {
        $prepare = "SELECT " . $columns . " FROM " . $table;

        if ($query != null) {
            $prepare = $prepare . " " . $query;
        }

        $query = $this->query($prepare, $associate);
        $this->connection->close();

        return $query;
    }

    public function count($table, $column = "id")
    {
        $prepare = "SELECT COUNT(" . $column . ") FROM " . $table;
        $query = $this->query($prepare, true);
        $query = $query['COUNT(' . $column . ')'];

        return $query;
    }

    public function update($table, $id, $values = [])
    {

        $statement = "UPDATE " . $table . " SET ";
        $values['updated_at'] = date("Y-m-d H:i:s");

        foreach ($values as $v => $val) {
            $i = array_search($v, array_keys($values));

            if (count($values) == $i + 1) {

                if ($val == null) {
                    $statement = $statement . "`" . $v . "` = NULL";
                } else {
                    $statement = $statement . "`" . $v . "` = '" . $val . "'";
                }
            } else {
                if ($val == null) {
                    $statement = $statement . "`" . $v . "` = NULL, ";
                } else {
                    $statement = $statement . "`" . $v . "` = '" . $val . "', ";
                }
            }
        }

        // print_r($statement);
        // die();
        $prepare = $statement . " WHERE (`id` = '" . $id . "');";


        $statement = $this->connection->prepare($prepare);

        if ($statement == false) {
            return header("location: /500");

            // print_r($this->connection->error);
            // die();
        }

        $exectute = $statement->execute();

        $this->connection->close();

        return true;
    }

    public function delete($table, $id)
    {
        $prepare = "DELETE FROM " . $table . " WHERE id = '" . $id . "'";
        $statement = $this->connection->prepare($prepare);

        if ($statement == false) {
            return header("location: /500");;

            // var_dump($this->connection->error);
            // die();
        }

        $statement->execute();
        $this->connection->close();

        return true;
    }
}
