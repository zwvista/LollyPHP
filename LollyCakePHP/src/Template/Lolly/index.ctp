<?php require 'langList.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CakePHP - Lolly</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="lolly.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script>
$(function() {
	var $lang = $('#lang');
	var $dict = $('#dict');
	$lang.change(function() {
 	    $.post("dictList.php", $('form').serialize(), function(response) {
            $dict.empty();
            $dict.html(response);
 		});
	});
	$lang.change();
	var redirectSearch = false;
    $('#search').click(function() {redirectSearch = false;});
    $('#redirectSearch').click(function() {redirectSearch = true;});
	$('form').submit(function() {
		if(redirectSearch) return;
		event.preventDefault();
        $.ajax({
            type: "POST",
            url: "dictUrl.php",
            data: $('form').serialize(),
            success: function(response) {
                $('#wordError').empty();
                var word = $('#word').val();
                var url = response.replace('{0}', encodeURIComponent(word));
                $('#dictframe').attr('src', url);
            },
            error: function(response) {
                //alert(JSON.stringify(response));
                var err = response.responseText;
                $('#wordError').html(err);
                $('#dictframe').attr('src', 'about:blank');
            }
        });
    });
});
</script>
</head>
<body>
<form class="form-horizontal" method="post" action='search.php'>
	<div class="form-group">
		<label class="col-sm-1 control-label" for='lang'>Language:</label>
    	<div class="col-sm-3">
			<select class="form-control" name="selectedLangID" id="lang" >
				<?php foreach($langlist as $lang) { ?>
					<option value="<?php echo $lang['LANGID'] ?>">
						<?php echo $lang['LANGNAME'] ?>
					</option>
				<?php } ?>
			</select>
		</div>
		<label class="col-sm-1 control-label" for='dict'>Dictionary:</label>
    	<div class="col-sm-3">
			<select class="form-control" name="selectedDictName" id="dict">
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-1 control-label" for='word'>Word:</label>
    	<div class="col-sm-3">
			<input type="text" class="form-control" name="word" id="word" value="一人" />
		</div>
        <input type="submit" class="btn btn-primary" value='Search' id='search' />
        <input type="submit" class="btn btn-primary" value='Search(redirect)' id='redirectSearch' />
        <div class="col-sm-3 error vcenter" id='wordError'></div>
	</div>
</form>
<iframe id='dictframe'>
</iframe>
</body>
</html>