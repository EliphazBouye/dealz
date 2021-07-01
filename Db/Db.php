<?php

namespace App\Db;

//Import PDO
use PDO;
use PDOException;

class Db extends PDO
{
    private static $instance;

    //Database connection informations
    private const DBHOST = 'localhost';
    private const DBNAME = 'dealz_db';
    private const DBUSER = 'root';
    private const DBPASS = 'root';

    /**
     * Constructor take informations for database connection and send request for database connection 
     */
    private function __construct()
    {
        $_dsn = 'mysql:host=' . self::DBHOST . ';dbname=' . self::DBNAME;
        try {
            parent::__construct($_dsn, self::DBUSER, self::DBPASS);

            $this->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, 'SET NAMES utf8');
            $this->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
