<?php

try {
    $db = new PDO('sqlite:../LollyCore.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $langlist = $db->query("SELECT * FROM VLANGUAGES WHERE ID <> 0");
    return $langlist;
} catch(PDOException $e) {
    echo $e->getMessage();
}
