<?php

try {
	$word = $_POST['word'];
	if (empty($word)) {
		http_response_code(404);
		echo "Word is required.";
	} else {
		$db = new PDO('sqlite:../LollyCore.db');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$langid = intval($_POST['selectedLangID']);
		$dictname = $_POST['selectedDictName'];
		$stmt = $db->prepare("SELECT * FROM VDICTIONARIES WHERE LANGIDFROM = :langid AND DICTNAME = :dictname");
		$stmt->bindParam(":langid", $langid);
		$stmt->bindParam(":dictname", $dictname);
		$stmt->execute();
		$dict = $stmt->fetch();
		$url = str_replace('{0}', $word, $dict['URL']);
		header('Location:' . $url);
	}
} catch(PDOException $e) {
    echo $e->getMessage();
}

