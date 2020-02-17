<?php

namespace Frame;

use PDO;
use PDOException;

class Database
{

    private $connection;
    private $log;

    public function __construct($log)
    {
	    if(CONFIG['use_database']) {
	        $this->log = $log;
	        try {
	            $this->connection = new PDO("mysql:host=" . CONFIG['db_hostname'] . ";dbname=" . CONFIG['db_name'] . ";charset=" . CONFIG['db_charset'], CONFIG['db_username'], CONFIG['db_password']);
	            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	            $this->connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
	        } catch (PDOException $e) {
	            $this->log->error($e->getMessage());
	        }
	    }
    }

    // Select
    public function select($sql, $param = [])
    {
        $statement = $this->connection->prepare($sql);
        $statement->execute($param);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insert
    public function insert($sql, $param = [])
    {
        $statement = $this->connection->prepare($sql);
        $statement->execute($param);
        return $this->connection->lastInsertId();
    }

    // Update
    public function update($sql, $param = [])
    {
        $statement = $this->connection->prepare($sql);
        $statement->execute($param);
        return $statement->rowCount();
    }

    // Remove
    public function remove( $sql, $param = [])
    {
        $statement = $this->connection->prepare($sql);
        $statement->execute($param);
        return $statement->rowCount();
    }

    function __destruct()
    {
        $this->connection = null;
    }
}
