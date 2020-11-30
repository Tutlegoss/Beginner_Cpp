<?php

    session_start();


	$article = "Kpp Signup";
	require_once("../../inc/php/Fringes/header.inc.php");
?>
	<title><?php echo $headerData["Title"]; ?></title>
	<meta name="description" content="<?php echo $headerData["Description"]; ?>">

</head>

<body>
	<?php require_once("$headerData[Path]inc/php/Fringes/navbar.inc.php"); ?>

	<div class="container-fluid">
	<div class="row">
	<div id="article" class="col-12">
		<div class="container d-flex h-100">
			<div class="row justify-content-center align-self-center mx-auto">
				<div class="col-11 col-md-12 mt-5 mt-md-0 mb-5 mb-md-0" id="accountTxt">
					<h3 class="heading">Sign Up</h3>
					<hr>
					<p>Accounts are currently for Kent State students only.</p>
					<form action="" method="POST">
                        <div class="row mx-auto">
                            <div class="col-12 col-md-3">
                                <label class="kentYellow mt-2" for="Email">Email</label>
                            </div>
                            <div class="col-12 col-md-9 align-self-center">
                                <input class="fieldSize" type="email" name="Email" id="Email"
                                       pattern="^(.)*@kent.edu$" placeholder="@kent.edu required" required autofocus>
                           </div>
                        </div>
                        <div class="row mx-auto">
                            <div class="col-12 col-md-3 mt-2 mt-md-0">
                                <label class="kentBlue mt-2" for="Username">Username</label>
                            </div>
                            <div class="col-12 col-md-9 align-self-center">
                                <input class="fieldSize" type="text" name="Username" id="Username" minlength="1"
                                    maxlength="16" pattern="^\w{1,16}$" placeholder="1-16 Alphanums|No spaces" required>
                            </div>
                        </div>
                        <div class="row mx-auto">
                            <div class="col-12 col-md-3 mt-2 mt-md-0">
                                <label class="mt-2" for="Password">Password</label>
                            </div>
                            <div class="col-12 col-md-9 align-self-center">
                                <input class="fieldSize" type="password" name="Password" id="Password"
                                     minlength="1" maxlength="30" pattern=".{8,30}" placeholder="8-30 Chars" required>
                            </div>
                          </div>
    					<button class="btn btnBlue mt-4" type="submit" id="newAcct">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>

	<?php
		require_once("$headerData[Path]inc/php/Fringes/footer.inc.php");

        ob_end_flush();
	?>

</body>
</html>

<script>
/* https://stackoverflow.com/questions/14236873/disable-spaces-in-input-and-allow-back-arrow */
	$(document).ready(function() {
		$('#Username').on({
			keydown: function(e) {
				if(e.which === 32)
					return false;
			},
			change: function() {
				this.value = this.value.replace(/\s/g, "");
			}
		});
	});
</script>
