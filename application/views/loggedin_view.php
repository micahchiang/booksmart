<?php
	$userData = $this->session->userdata('userData');
?>
<html>
<head>
	<title>Books Home</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="/assets/styles/dashboard.css" type="text/css">
</head>
<body>
	<div id = "wrapper" class = "container">
		<nav class = "navbar navbar-default">
			<div id = 'header' class = 'navbar-header'>
				<h1>Welcome, <?= $userData['alias']?></h1>
			<ul class = "nav navbar-nav">
				<li><a href = '/bookcontroller/'>Add Book and Review</a></li>
				<li><a href = '/main/destroy'>Logout</a></li>
			</ul>
			</div>
		</nav>
			<div id ='bookreviews' class = "col-md-8">
				<h1>Recent Book Reviews:</h1>
				<div class = "recentreviews">
<?php
				//var_dump($reviews);
				// foreach($reviews as $review){
				for($i=0; $i<3; $i++){
					//echo $reviews[0]['title'];

?>
					<div class='reviews'>
						 <h4><?= $reviews[$i]['title'] ?></h4>
						 <p>Rating: <img src="/assets/img/<?= $reviews[$i]['rating']?>.png"></p>
						 <p><a href="/main/showUser/<?= $reviews[$i]['user_id']?>"><?= $reviews[$i]['alias'] ?></a> says: <?= $reviews[$i]['comment']?></p>
						 <p>Posted on <?= $reviews[$i]['created_at']?></p>
					</div>

<?php			}
				//}
?>
				</div>
			</div>
			<div id = "otherbooks" class = 'col-md-4'>
				<h5>Other Books with Reviews:</h5>
				<div id = "booklist">
<?php 
						foreach($books as $book)
						{ 
?>
							<a href ="/reviewcontroller/show/<?=$book['id']?>"><?=$book['title']?></a><br>
<?php					}


?>
				</div>
			</div>
	</div>

</body>
</html>