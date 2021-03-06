<?php
    function retryLink()
    {
        echo "<p class='ml-4 kentBlue'>URL is malformed. Please click the link from your email again.</p>";
        echo "<p class='ml-4 kentBlue'>If this message appears again,<br> please request a new email here: ";
        echo "<a href='./Forgot.php'>Forgot Password</a></p>";
    }

    /*
        Return FALSE to keep form (password wasn't successfully reset / minor error)
        Return TRUE  to erase form (password reset successful / major error)
    */
    function resetPassword()
    {
        global $conn;

        /* Can't access page directly */
        if(!$_POST && !isset($_GET['ext'])) {
            echo "<p class='ml-4 kentYellow'>No valid reset password configuration found. Redirecting to login...</p>";
            header("refresh: 2; url='./Login.php'");
            return TRUE;
        }

        /* Ensure link is valid */
        if(isset($_GET['ext'])) {
            $extMatch = $conn->prepare("SELECT * FROM ForgotPass WHERE ResetExt = ?;");
            $extMatch->bindParam(1, $_GET['ext'], PDO::PARAM_STR, 32);
            $extMatch->execute();
            $extMatch = $extMatch->fetch(PDO::FETCH_ASSOC);

            if(!$extMatch) {
                echo "<p class='ml-4 kentBlue'>Link is no longer valid.</p>";
                echo "<p class='ml-4 kentBlue'>Go to <a href='Forgot.php'>Forgot Password</a> to restart the process.</p>";
                return TRUE;
            }
            else {
                return FALSE;
            }
        }

        if($_POST) {
            /* URL contains ext argument */
            if(isset($_POST['ext']) && !empty($_POST['ext'])) {
                /* Compare password fields */
                if($_POST['Password'] === $_POST['PasswordVerify']) {
                    /* Verify ext matches user's ID */
                    $extMatch = $conn->prepare("SELECT * FROM ForgotPass WHERE ResetExt = ?;");
                    $extMatch->bindParam(1, $_POST['ext'], PDO::PARAM_STR, 32);
                    $extMatch->execute();
                    $extMatch = $extMatch->fetch(PDO::FETCH_ASSOC);

                    if($extMatch) {
                        /* Update user account */
                        $argonHash = password_hash($_POST['Password'], PASSWORD_ARGON2ID);

                        $updateAccount = $conn->prepare("UPDATE Accounts SET Password = ? WHERE ID = ?;");
                        $updateAccount->bindParam(1, $argonHash, PDO::PARAM_STR, 128);
                        $updateAccount->bindParam(2, $extMatch['ID'], PDO::PARAM_STR, 128);
                        if($updateAccount->execute()) {
                            /* Delete ForgotPass record */
                            $delExt = $conn->prepare("DELETE FROM ForgotPass WHERE ResetExt = ?;");
                            $delExt->bindParam(1, $_POST['ext'], PDO::PARAM_STR, 32);
                            if($delExt->execute()) {
                                echo "<p class='ml-4 kentBlue'>Password updated! Click below to log in or leave page.</p>";
                                echo "<p><a class='ml-4' href='./Login.php'>Login</a></p>";
                                return TRUE;
                            }
                            /* Password updated but record not deleted from ForgotPass - Delete manually */
                            else {
                                error_log("$extMatch[ID] changed password but ForgotPass record not deleted!", 1, "Lmarchan@kent.edu");
                                echo "<p class='ml-4 kentBlue'>Password updated! Click below to log in or leave page.</p>";
                                echo "<p><a href='./Login.php'>Login</a></p>";
                                return TRUE;
                            }
                        }
                        /* Could not update password */
                        else {
                            retryLink();
                            return TRUE;
                        }
                    }
                    /* No ext match */
                    else {
                        retryLink();
                        return TRUE;
                    }
                }
                /* Passwords do not match */
                else {
                    echo "<p class='ml-4 kentYellow'>Passwords do not match. Please retry.</p>";
                    return FALSE;
                }
            }
            /* Malformed URL */
            else {
                retryLink();
                return TRUE;
            }
        }
        else {
            return FALSE;
        }
    }
