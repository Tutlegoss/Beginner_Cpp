<?php
    function goToIndex()
    {
       header("Location: ../../index.php");
    }

    function loggedIn()
    {
        if(isset($_SESSION['LoggedIn']) && $_SESSION['LoggedIn'] == TRUE)
            goToIndex();
    }

    function validateSignup()
    {
        if($_POST) {
            global $conn;
            $invalidEntries = FALSE;

            /* Check for @kent.edu email address */
            $_POST["Email"] = strtolower($_POST["Email"]);
            if(strpos($_POST["Email"], "@kent.edu") === FALSE ||
               preg_match("/^(.)*@kent.edu$/", $_POST["Email"]) == 0) {
                echo "<p class='kentYellow ml-4'>Invalid email. Please use @kent.edu email.</p>";
                $invalidEntries = TRUE;
            }

            /* Check for valid username combination */
            if(preg_match("/^\w{1,16}$/", $_POST["Username"]) == 0) {
                echo "<p class='kentYellow ml-4'>Invalid username. Please enter 1 to 16 alphanumeric characters, no spaces.</p>";
                $invalidEntries = TRUE;
            }

            /* Check for valid password combination */
            if(preg_match("/^.{8,30}$/", $_POST["Password"]) == 0) {
                echo "<p class='kentYellow ml-4'>Invalid password. Please enter 8 to 30 characters.</p>";
                $invalidEntries = TRUE;
            }

            /* Don't modify the HTML...rude */
            if($invalidEntries) {
                echo "<p class='co-m ml-4'>Please don't modify the HTML. Thank you.</p>";
            }

            /* Check for existing email */
            $signUpCheck = $conn->prepare("SELECT 1 FROM Accounts WHERE Email = ?;");
            $signUpCheck->bindParam(1, $_POST["Email"], PDO::PARAM_STR, 24);
            $signUpCheck->execute();
            $signUpCheck = $signUpCheck->fetch(PDO::FETCH_ASSOC);
            if($signUpCheck) {
                echo "<p class='kentYellow ml-4'>Email is already associated with an account.</p>";
                $invalidEntries = TRUE;
            }

            /* Check for existing username */
            $signUpCheck = $conn->prepare("SELECT 1 FROM Accounts WHERE Username = ?;");
            $signUpCheck->bindParam(1, $_POST["Username"], PDO::PARAM_STR, 16);
            $signUpCheck->execute();
            $signUpCheck = $signUpCheck->fetch(PDO::FETCH_ASSOC);
            if($signUpCheck) {
                echo "<p class='kentYellow ml-4'>Username is already taken.</p>";
                $invalidEntries = TRUE;
            }

            /* Don't process if any of the above checks are invalid */
            if($invalidEntries) {
                return $invalidEntries;
            }

            /* Create unique ID for user */
            $IDMatch = TRUE;
            while($IDMatch) {
                $ID = bin2hex(random_bytes(8));
                $signUpCheck = $conn->prepare("SELECT 1 FROM Accounts WHERE ID = ?;");
                $signUpCheck->bindParam(1, $ID, PDO::PARAM_STR, 16);
                $signUpCheck->execute();
                $signUpCheck = $signUpCheck->fetch(PDO::FETCH_ASSOC);
                if(!$signUpCheck)
                    $IDMatch = FALSE;
            }

            /* Hash password */
            $argonHash = password_hash($_POST['Password'], PASSWORD_ARGON2ID);

            /* Insert account into the database */
            $accountInsert = $conn->prepare("INSERT INTO Accounts VALUES (?, ?, ?, ?, 'Student');");
            $accountInsert->bindParam(1, $ID, PDO::PARAM_STR, 16);
            $accountInsert->bindParam(2, $_POST["Username"], PDO::PARAM_STR, 16);
            $accountInsert->bindParam(3, $argonHash, PDO::PARAM_STR, 128);
            $accountInsert->bindParam(4, $_POST["Email"], PDO::PARAM_STR, 16);
            if($accountInsert->execute())
                header("Location: ./Login.php");
            else
                echo "<p class='ml-4 co-m'>Failure to create account.</p>";
        }
        return;
    }
