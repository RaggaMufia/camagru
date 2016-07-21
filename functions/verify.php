<?php

function verify($token) {
  include './setup/database.php';

try {
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query= $dbh->prepare("SELECT id FROM users WHERE token=?");
    $query->execute(array($token));

    $val = $query->fetch();
    if ($val == null) {
        return (-1);
    }
    $query->closeCursor();

    $query= $dbh->prepare("UPDATE users SET verified='Y' WHERE id=?");
    $query->execute(array($val['id']));
    $query->closeCursor();
    return (0);
  } catch (PDOException $e) {
    return (-2);
  }
}

?>