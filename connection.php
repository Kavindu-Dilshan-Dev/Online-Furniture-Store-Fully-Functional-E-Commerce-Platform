<?php
class Database
{
    public static $connection;

    public static function setupConnection()
    {
        if (!isset($connection)) {
            Database::$connection = new mysqli("localhost", "root", "Kavindu@dilshan", "downsouth_furniture_db", "3306");
        }
    }

    public static function iud($q)
    {
        Database::setupConnection();
        Database::$connection->query($q);
    }

    public static function search($q)
    {
        Database::setupConnection();
        $resultset = Database::$connection->query($q);
        return $resultset;
    }
}
