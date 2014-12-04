<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax Exercise</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).on("submit", "form", function() {
			$.post(
				$('#post').attr('action'),
				$('#post').serialize(),
				function(output) {
					$('#notes').prepend("<div class='post'>"+output+"</div>")
				}, "json"
			);
			return false;
		});
	</script>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
</head>
<body>
	<h1>My Posts:</h1>
	<div id="notes">
<?php  if(!empty($posts)) {
			foreach ($posts as $post) { ?>
		<div class='post'><?php echo $post['post'] ?></div>
<?php 		}
		} ?>
<!-- 		<div class="post">Add a new note below</div> -->
	</div>
	<form id="post" action="/create" method="post">
		<h3>Add a note:</h3>
		<textarea id="text" name="post"></textarea>
		<input type="submit" name="submit" value="Post It!">
	</form>
</body>
</html>