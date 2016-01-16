<?php
	
?>

<html>
<head>
	<title>User Info</title>
	<meta charset = "utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="/assets/styles/user.css" type = 'text/css'>
</head>

<body>
	<div id = "wrapper" class = 'container'>
		<nav class = 'navbar navbar-default'>
		<div id = "header">
			<ul class = 'nav navbar-nav'>
			<li><a id = "main" href="/main/welcome">Home</a></li>
			<li><a href = '/bookcontroller/'>Add Book and Review</a></li>
			<li><a href = '/main/destroy'>Logout</a></li>
			</ul>
		</div>
		</nav>
		<div id = 'userinfo'>
		<p>User Alias:  <?= $userinfo[0]['alias']?></p>
		<p>Name:  <?= $userinfo[0]['name']?> </p>
		<p>Email:  <?= $userinfo[0]['email']?> </p>
		<p>Total Reviews: <?= $reviewCount ?></p>
		</div>
		<div id = 'bookreviews'>
		<p>Posted Reviews on the following books: </p>
<?php 		foreach($userinfo as $info)
			{
?>
				<a href = "/reviewcontroller/show/<?= $info['book_id'] ?>"><?= $info['title'] ?></a><br>
<?php       
			}
?>

	</div>


		

	</div>
</body>
</html>