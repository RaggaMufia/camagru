#!/usr/bin/php
<?php
include 'database.php';

// DROP DATABASE
try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "truncate `gallery`";
        $dbh->exec($sql);

        array_map('unlink', glob("../montage/*.png"));
        echo "Montage cleaned successfully\n";
    } catch (PDOException $e) {
        echo "ERROR CLEANING DB: \n".$e->getMessage()."\n";
    }
?>
