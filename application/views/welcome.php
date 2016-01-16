<html>
<head>
	<title>Welcome!</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel = "stylesheet" href="/assets/styles/login.css" type = "text/css">
</head>
<body>
	<div id ="wrapper" class = "container">
		<h1>Welcome to Book Smart</h1>

		<div id ='register'>
			<h4>Register</h4>
			<form action='/main/add' method='post' class = 'form-horizontal'>
				<label>Name: </label><input type='text' name='name'>
				<label>Alias: </label><input type='text' name='alias'>
				<label>Email: </label><input type='text' name='email'>
				<label>Password: </label><input type='password' name='password'>
				<p>*Password should be at least 8 characters</p>
				<label>Confirm PW: </label><input type='password' name='confirm_password'>
				<input class = "btn btn-primary" type='submit' value='Register'>
			</form>
			<?=$this->session->flashdata('reg_errors')?>
		</div>
		<div id ='login' class = 'form-group'>
			<h4>Login</h4>
			<form action='/main/login' method='post'>
				<label>Email: </label><input type='text' name='email'>
				<label>Password: </label><input type='password' name='password'>
				<input class = "btn btn-primary" type='submit' value='Login'>
			</form>
			<?=$this->session->flashdata('login_errors')?>
		</div>

		<div id = 'aboutSection'>
			<p id = 'abouttext'>Book Smart is a social media platform where friends can hang out and give honest reviews of books they've recently read. </p>
		</div>
	</div>
	
</body>
</html>