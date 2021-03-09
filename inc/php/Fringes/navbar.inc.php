
    <nav class="navbar navbar-dark navbar-expand-md">
        <a class="navbar-brand" href="<?php echo $headerData["Path"]; ?>index.php">
            <img src="<?php echo $headerData["Path"]; ?>img/SiteImgs/Kpp.png" alt="Kpp"></a>
        <button id="toggler" class="navbar-toggler" type="button" aria-label="Hamburger"
                data-toggle="collapse" data-target="#collapsibleNavbar">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="nav mr-auto mt-2 mt-md-0 justify-content-around flex-nowrap align-items-center">
                <li>
                    <a id="nav-CSI" class="nav-link"
                        href="<?php echo $headerData["Path"]; ?>pages/Cpp/CppTopics.php">C++</a>
                </li>
                <li>
                    <a id="nav-CSII" class="nav-link"
                        href="<?php echo $headerData["Path"]; ?>game/connect4.php">Conn4</a>
                </li>
                <li>
                    <a id="nav-CSIII" class="nav-link text-white"
                        href="<?php echo $headerData["Path"]; ?>pages/Blog/OP_OOE.php">Blog</a>
                </li>
                <li>
                    <a id="nav-Algo" class="nav-link"
                        href="<?php echo $headerData["Path"]; ?>pages/Algo/AlgoTopics.php">Algo</a>
                </li>
            </ul>
            <ul id="searchAcct" class="nav flex-nowrap mt-3 mb-2 mt-md-0 mb-md-0">
                <li>
                    <form action="#" class="form-inline my-auto" method="GET" >
                        <input class="form-control" name="search" id="search" type="search" placeholder="Search">
                        <label for="search"></label>
                        <button class="btn text-white" type="submit" aria-label="Search">
                                <i class="fas fa-search"></i>
                        </button>
                    </form>
                </li>
                <li class="nav-item dropdown text-center">
                    <a class="text-white nav-link dropdown-toggle" href="#" data-toggle="dropdown">Account</a>
                    <div id="nav-Account" class="dropdown-menu">
                        <?php
                            $login = "$headerData[Path]pages/Account/Login.php";
                            $admin = "$headerData[Path]pages/Admin/";
                            $personal = "$headerData[Path]pages/Account/Personal.php";
                            $logout = "$headerData[Path]pages/Account/Logout.php";
                            $signup = "$headerData[Path]pages/Account/Signup.php";

                            if(isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] == TRUE)
                            {
                                if(isset($_SESSION["Privilege"]) && $_SESSION["Privilege"] == "Admin")
                                    echo "<a class='dropdown-item' href='$admin'>Admin</a>";

                                echo "<a class='dropdown-item' href='$personal'>Personal</a>
                                      <a class='dropdown-item' href='$logout'>Logout</a>";
                            }
                            else
                            {
                                echo "<a class='dropdown-item' href='$login'> Login </a>
                                      <a class='dropdown-item' href='$signup'>Signup</a>";
                            }
                        ?>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
