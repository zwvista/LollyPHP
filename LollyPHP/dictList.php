<?php

try {
    $db = new PDO('sqlite:../Lolly.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $langid = intval($_POST['selectedLangID']);
    $stmt = $db->prepare("SELECT * FROM DICTALL WHERE LANGID = :langid");
    $stmt->bindParam(":langid", $langid);
    $stmt->execute();
    $dictlist = $stmt->fetchAll();
    foreach($dictlist as $dict) {
    	echo '<option>' . $dict['DICTNAME'] . '</option>';
    }
} catch(PDOException $e) {
    echo $e->getMessage();
}

