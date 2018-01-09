<?php

namespace codeeducation\Database;

class DatabaseFetch
{

    public static function fetchAll($pdo, $table)
    {
        $query = $pdo->prepare("SELECT * FROM $table");
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

}