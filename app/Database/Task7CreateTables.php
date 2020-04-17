<?php


namespace App\Database;


class Task7CreateTables
{
    private function __construct() {}

    public static function create() {
        $pdo = Database::connect();

        $pdo->exec('CREATE TABLE IF NOT EXISTS museums (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(128) NOT NULL,
            city VARCHAR(128) NOT NULL,
            rating INT NOT NULL
        ) ENGINE=INNODB;');

        $pdo->exec('CREATE TABLE IF NOT EXISTS paintings (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(128) NOT NULL,
            creation_year INT NOT NULL,
            
            museum_id INT UNSIGNED NOT NULL,
            FOREIGN KEY (museum_id) REFERENCES museums(id)
        ) ENGINE=INNODB;');
    }
}