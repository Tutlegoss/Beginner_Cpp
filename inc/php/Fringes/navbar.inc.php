
    <nav class="navbar navbar-dark navbar-expand-md">
        <a class="navbar-brand" href="<?php echo $headerData["Path"]; ?>index.php">
            <img src="<?php echo $headerData["Path"]; ?>img/SiteImgs/Kpp.png" alt="Kpp"></a>
        <button id="toggler" class="navbar-toggler" type="button" aria-label="Hamburger"
                data-toggle="collapse" data-target="#collapsibleNavbar">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="nav mt-2 mt-md-0">
                <li class="nav-item dropdown">
                    <a class="text-white
                        <?php
                            if(preg_match("/(Account|Admin)/", $_SERVER["REQUEST_URI"], $matches))
                                echo "activeNav";
                        ?>
                        nav-link dropdown-toggle" href="#" data-toggle="dropdown">Account</a>
                    <div class="dropdown-menu">
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
                <li class="nav-item dropdown">
                    <a id="nav-Prog-Link" class="
                        <?php
                            if(preg_match("/(Cpp|Algo|.+\/Blog)/", $_SERVER["REQUEST_URI"], $matches))
                                echo "activeNav";
                        ?>
                        nav-link dropdown-toggle" href="#" data-toggle="dropdown">Programming</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo $headerData["Path"]; ?>pages/Cpp/CppTopics.php">C++ PDFs</a>
                        <a class="dropdown-item" href="<?php echo $headerData["Path"]; ?>pages/Blog/OP_OOE.php">Blog</a>
                        <a class="dropdown-item" href="<?php echo $headerData["Path"]; ?>pages/Algo/AlgoTopics.php">Algorithms</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a id="nav-Collect-Link" class="
                        <?php
                            if(preg_match("/(Catalog)/", $_SERVER["REQUEST_URI"], $matches))
                                echo "activeNav";
                        ?>
                        nav-link dropdown-toggle" href="#" data-toggle="dropdown">Collections</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?php echo $headerData["Path"]; ?>pages/Catalog/Catalogs.php">Menu</a>
                        <a class="dropdown-item" href="<?php echo $headerData["Path"]; ?>pages/Catalog/MarioFiguresCatalog.php">Mario Jakks Pacific</a>
                        <a class="dropdown-item" href="<?php echo $headerData["Path"]; ?>pages/Catalog/MarioKartCatalog.php">Mario Hot Wheels</a>
                    </div>
                </li>
                <li>
                    <a class="text-white
                        <?php
                            if(preg_match("/(game)/", $_SERVER["REQUEST_URI"], $matches))
                                echo "activeNav";
                        ?>
                        nav-link"
                        href="<?php echo $headerData["Path"]; ?>game/connect4.php">Conn4</a>
                </li>
                <li class="nav-item dropdown">
                    <a id="nav-Search-Link" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="dropdown-menu" id="search">
                        <form action="#" class="d-flex" method="GET" >
                            <input class="form-control" name="search" type="search" placeholder="Search">
                            <button class="btn text-white" type="submit" aria-label="Search">
                                    <i class="fas fa-search"></i>
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
