<?php
    function logout()
	{
		if(isset($_SESSION['LoggedIn']) && $_SESSION == TRUE) {
			echo "<h3 class='heading'>Logging Out</h3>";
			echo "<hr>";
			echo "<h5 class='kentYellow'>Logging out of session. Redirecting to the home page...</h5>";
            $_SESSION = [];
            session_unset();
			session_destroy();
		}
		else {
			echo "<h3 class='heading'>Not Signed In</h3>";
			echo "<hr>";
			echo "<h5 class='kentYellow'>You aren't currently signed in. Redirecting to the home page...</h5>";
		}
	}
