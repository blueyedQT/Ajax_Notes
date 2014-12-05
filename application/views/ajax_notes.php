<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Note Manager</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<script src="/assets/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<script type="text/javascript">
		$(document).on("submit", "form", function() {
			console.log($(this).attr('action'));
			thisOne = this;
			$.post(
				$(this).attr('action'),
				$(this).serialize(),
				function(output) {
					if(output.action == 'add') {
						$('#all_notes').prepend(
							"<div class='note'>"+
								"<h3>"+output.title+"</h3>"+
								"<form class='update' action='update_note' method='post'>"+
									"<input type='text' name='description' value='"+output.description+"'>"+
									"<input type='hidden' name='id' value='"+output.id+"'>"+
								"</form>"+
								"<form class='delete' action='delete' method='post'>"+
									"<input type='hidden' name='id' value='"+output.id+"'>"+
									"<input type='submit' name='delete' value='Delete'>"+
								"</form>"+
							"</div>");
					} else if(output.action == 'delete') {
						$(thisOne).parent().remove();
					}
				}, "json"
			);
			return false;
		});
	</script>
</head>
<body>
	<div class="container">
		<h1>Ajax Notes</h1>
		<div id="all_notes">
<?php 	if(!empty($notes)) {
			foreach($notes as $note) { ?>
			<div class="note">
				<h3><?php echo $note['title'] ?></h3>
				<form class="update" action="update_note" method="post" role="form">
					<input type="text" name="description" value="<?php echo $note['description'] ?>">
					<input type="hidden" name="id" value="<?php echo $note['id'] ?>">
				</form>
				<form class="delete" action="delete" method="post" role="form">
					<input type="hidden" name="id" value="<?php echo $note['id'] ?>">
					<input type="submit" name="delete" value="Delete">
				</form>
			</div>
<?php		}
		} ?>
		</div>
		<h2>Add New Note</h2>
		<form id="add_new" action="add_note" method="post">
			<p>Title: <input type="text" name="title"></p>
			<textarea name="description"></textarea>
			<input class="btn" type="submit" name="add" value="Add Note">
		</form>
	</div>
</body>
</html>