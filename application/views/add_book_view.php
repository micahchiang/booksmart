<?php
	$userData = $this->session->userdata('userData');
?>
<html>
<head>
	<title>Add Book and Review</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel = 'stylesheet' href = '/assets/styles/addbook.css' type = 'text/css'>
</head>
<body>
	<div id='wrapper'>
		<nav class = "navbar navbar-default">
		<div id='header'>
			<ul class = "nav navbar-nav">
			<li><a href="/main/welcome">Home</a></li>
			<li><a href="/main/destroy">Logout</a></li>
			</ul>	
		</div>
		</nav>

		<div id='content' class = 'container'>
			<h1>Hello <?= $userData['alias']?></h1>
			<h4>Add a New Book Title and a Review:</h4>
			<form action='/bookcontroller/create' method='post'>
				<div class = 'form-group'>
					<label>Book Title: </label><input type='text' name='title'>
				</div>
				<div class = 'form-group'>
					<h5>Select Author from the list, or add a new one<h5>
					<div class = 'form-group'>
						<label>Choose from the list: </label> 
						<select name='author'>
<?php
							foreach($authors as $author){
?>
							<option value='<?=$author['author']?>'><?=$author['author']?></option>
<?php
							}
							// <option value='asdfawef'>asdfasd</option>
							// <option value='asdfawef'>asdfasd</option>
?>
						</select>
					</div>
						<label>Add a new author: </label><input type='text' name='new_author'>
					
				</div>
				<div class = 'form-group'>
					<label id = 'reviewlabel'>Review: </label><textarea name='comment' rows='5' cols='20'></textarea>
				</div>
				<div class = 'form-group'>
					<label>Rating: </label>
					<select name='rating'>
						<option value='0'>0</option>
						<option value='1'>1</option>
						<option value='2'>2</option>
						<option value='3'>3</option>
						<option value='4'>4</option>
						<option value='5'>5</option>
					</select>
					stars.
					
				</div>
					<input type='hidden' name ='user_id' value="<?= $userData['id']?>">
					<input class = 'btn btn-primary' type='submit' value='Add Book and Review'>
			</form>
		</div>

	</div>

</body>
</html>