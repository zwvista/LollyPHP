<?php

try {
    $db = new PDO('sqlite:../Lolly.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $langlist = $db->query("SELECT * FROM LANGUAGES WHERE LANGID <> 0");
    return $langlist;
} catch(PDOException $e) {
    echo $e->getMessage();
}
