<?php

try {
	$word = $_POST['word'];
	if (empty($word)) {
		http_response_code(404);
		echo "Word is required.";
	} else {
		$db = new PDO('sqlite:../Lolly.db');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$langid = intval($_POST['selectedLangID']);
		$dictname = $_POST['selectedDictName'];
		$stmt = $db->prepare("SELECT * FROM DICTALL WHERE LANGID = :langid AND DICTNAME = :dictname");
		$stmt->bindParam(":langid", $langid);
		$stmt->bindParam(":dictname", $dictname);
		$stmt->execute();
		$dict = $stmt->fetch();
		echo $dict['URL'];
	}
} catch(PDOException $e) {
    echo $e->getMessage();
}

