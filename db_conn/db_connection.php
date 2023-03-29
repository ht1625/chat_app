<?php

namespace App;

/**
 * SQLite bağlantısı
 */
class SQLiteConnection {
    /**
     * @var type 
     */
    private $pdo;

    /**
     * SQLite veritabanına bağlanan PDO nesnesi örneğini return et
     * @return \PDO
     */
    public function connect() {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
        }
        return $this->pdo;
    }
}