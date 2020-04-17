<?php


namespace App\Database;

use \PDO;

class Database
{
    private static $pdo;

    private function __construct() {}

    public static function connect() {
        if (!self::$pdo) {

            if (isset($_ENV['APP_ENV']) && $_ENV['APP_ENV'] == 'local') {
                self::$pdo = new \PDO("mysql:host=shadow-web-labs-db;port=3306;user=local;password=secret;dbname=shadow-web-labs");
                self::$pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } else {
                $db = parse_url(getenv("JAWSDB_URL"));
                self::$pdo = new \PDO("mysql:" . sprintf(
                        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
                        $db["host"],
                        $db["port"],
                        $db["user"],
                        $db["pass"],
                        ltrim($db["path"], "/")
                    ));
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            }
        }
        return self::$pdo;
    }
}