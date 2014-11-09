<?php

try {
    $db = new PDO('sqlite:Lolly.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $langid = intval($_POST['selectedLangID']);
    $dictname = $_POST['selectedDictName'];
    $stmt = $db->prepare("SELECT * FROM DICTALL WHERE LANGID = :langid AND DICTNAME = :dictname");
    $stmt->bindParam(":langid", $langid);
    $stmt->bindParam(":dictname", $dictname);
    $stmt->execute();
    $dictlist = $stmt->fetchAll();
    foreach($dictlist as $dict) {
    	echo $dict['URL'];
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

