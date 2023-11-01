<?php
session_start();
if (isset($_SESSION['message'])) {
?>
	<strong>
		<?= $_SESSION['message'] ?>
	</strong>
<?php
	unset($_SESSION['message']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="css/loginregister.css" />
	<title>Login</title>
</head>

<body>
	<section class="form_section">
		<div class="container">
			<nav class="nav">
				<div class="logo">
					<h3>FashRev</h3>
				</div>
			</nav>
			<div class="form_ui">
				<div class="form_head">
					<div class="form_head_sec1">
						<h4>Welcome to <span class="head_intro">FashRev</span></h4>
						<h2>Sign in</h2>
					</div>
					<div class="form_head_sec2">
						<p>No Account?</p>
						<p>
							<span class="reg_link">
								<a href="register.php">SignUp</a>
							</span>
						</p>
					</div>
				</div>
				<form action="auth/authcode.php" method="POST" class="_form">
					<div class="form_div">
						<label for="email">Enter your Email address</label><br />
						<input name="email" type="email" id="email" placeholder="Email address" />
					</div>
					<div class="form_div">
						<label for="password">Enter your password</label> <br />
						<input name="password" type="password" id="password" placeholder="Password" />
					</div>
					<br />
					<button type="submit" class="submit_btn" name="login_btn">
						Sign In
					</button>
				</form>
			</div>
		</div>
	</section>
</body>

</html>