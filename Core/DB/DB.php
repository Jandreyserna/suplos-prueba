<?php

namespace Core\DB;

use PDO;

use PDOException;

class DB
{
    private static $instance = null;
    private $connection;

    private function __construct() {
        try {
            $host = $_ENV['DB_HOST'] ?? 'localhost';
            $db   = $_ENV['DB_DATABASE'] ?? 'suplos';
            $user = $_ENV['DB_USERNAME'] ?? 'root';
            $pass = $_ENV['DB_PASSWORD'] ?? '';

            $this->connection = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new DB();
        }

        return self::$instance;
    }

    public static function execute($query) {
        $connection = self::getInstance()->connection;
        $db = $connection->prepare($query);
        $db->execute();
        $response = $db->fetchAll(\PDO::FETCH_ASSOC);
        $db->closeCursor();

        return $response;
    }

    public function closeConnection() {
        $this->connection = null;
    }

}
