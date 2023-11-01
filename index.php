<?php
session_start();
include("config/db_config.php");
include('includes/header.php')
?>


<section class="main_section">

	<?php

	if (isset($_SESSION['message'])) {
	?>
		<strong>
			<?= $_SESSION['message'] ?>
		</strong>
	<?php
		unset($_SESSION['message']);
	}
	?>

	<div class="container">

		<?php
		include('includes/navbar.php')
		?>

		<div class="body_section">
			<div class="body_contents">
				<h1>Empower Your Style. Share Your Insights.</h1>
				<h4>
					Are you more than just a casual observer of fashion? Do you have a
					style perspective that's positively sizzling? Well, darlings,
					you've found your fashion haven right here at FashRev. Step into
					the spotlight and get ready to set the fashion world on fire with
					us on our electrifying stage.
				</h4>
			</div>

			<div class="review_btn">
				<div class="reviewnow">
					<a href="product_category.php"><button class="btnreview">Write a review</button></a>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="script.js"></script>
</body>

</html>