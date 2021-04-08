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

    function validateLogin()
    {
        if($_POST) {
            global $conn;

            /* See if username exists and verify password */
            $accountCheck = $conn->prepare("SELECT * FROM Accounts WHERE Username = ?;");
            $accountCheck->bindParam(1, $_POST["Username"], PDO::PARAM_STR, 16);
            $accountCheck->execute();
            $accountCheck = $accountCheck->fetch(PDO::FETCH_ASSOC);
            /* Retry login */
            if(!$accountCheck || !password_verify($_POST['Password'],$accountCheck['Password']))
            {
                echo "<p class='kentYellow ml-4'>There is an issue with Username and/or Password.</p>";
                return FALSE;
            }
            /* Populate $_SESSION - session_start() in header.inc.php */
            else {
                $_SESSION['LoggedIn']  = TRUE;
                $_SESSION['Username']  = $accountCheck['Username'];
                $_SESSION['Privilege'] = $accountCheck['Privilege'];
                $_SESSION['ID']        = $accountCheck['ID'];
                $_SESSION['IP']        = $_SERVER['REMOTE_ADDR'];

                goToIndex();
            }
        }
    }
