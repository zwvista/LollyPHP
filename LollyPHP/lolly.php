<?php require 'langList.php'; ?>
<html>
<head>
<title>PHP -Lolly</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
$(function() {
	var $lang = $('#lang');
	var $dict = $('#dict');
	$lang.change(function() {
 	    $.post("dictList.php", $(this).serialize(), function(response) {
			$("#dict option").remove();
			// alert(response);
			$dict.html(response);
 		});
	});
	$lang.change();
	$('#search').click(function() {
		// cannot use $(this).serialize()
	    $.post("dictUrl.php", $('#form').serialize(), function(response) {
			var word = $('#word').val();
			var url = response.replace('{0}', encodeURIComponent(word));
			// alert(url);
			$('#dictframe').attr('src', url);
	    });
	});
});
</script>
</head>
<body>
<form id="form" method="post">
	<table>
		<tr>
			<td>Language:</td>
			<td>
				<select name="selectedLangID" id="lang" >
					<?php foreach($langlist as $lang) { ?>
						<option value="<?php echo $lang['LANGID'] ?>">
							<?php echo $lang['LANGNAME'] ?>
						</option>
					<?php } ?>
				</select>
			</td>
			<td>Dictionary:</td>
			<td>
				<select name="selectedDictName" id="dict">
				</select>
			</td>
		</tr>
		<tr>
			<td>Word:</td>
			<td colspan=2>
				<input type="text" name="word" id="word" value="一人" />
			</td>
            <td>
                <input type="button" value="Search" id='search' />
            </td>
        </tr>
	</table>
</form>
<iframe id='dictframe' width='100%' height='500'>
</iframe>
</body>
</html>