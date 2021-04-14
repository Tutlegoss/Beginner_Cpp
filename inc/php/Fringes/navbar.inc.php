<div class="container-fluid">
    <nav class="navbar navbar-expand-md">
        <a class="navbar-brand" href="<?php echo $headerData["Path"]; ?>index.php">
            <img src="<?php echo $headerData["Path"]; ?>img/SiteImgs/Kpp.png" alt="Kpp"></a>
        <button id="toggler" class="navbar-toggler" type="button" aria-label="Hamburger"
                data-toggle="collapse" data-target="#collapsibleNavbar">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item mt-2 mt-md-0 mb-1 mb-md-0">
                    <div class="dropdown">
                        <a class="text-white nav-link dropdown-toggle <?php
                                if(preg_match("/(Account|Admin)/", $_SERVER["REQUEST_URI"], $matches))
                                    echo "activeNav";
                            ?>" href="#" data-toggle="dropdown">Account</a>
                        <ul class="dropdown-menu">
                                <?php
                                    $login = "$headerData[Path]pages/Account/Login.php";
                                    $admin = "$headerData[Path]pages/Admin/";
                                    $personal = "$headerData[Path]pages/Account/Personal.php";
                                    $logout = "$headerData[Path]pages/Account/Logout.php";
                                    $signup = "$headerData[Path]pages/Account/Signup.php";

                                    if(isset($_SESSION["LoggedIn"]) && $_SESSION["LoggedIn"] == TRUE)
                                    {
                                        if(isset($_SESSION["Privilege"]) && $_SESSION["Privilege"] == "Admin")
                                            echo "<li><a class='dropdown-item' href='$admin'>Admin</a></li>";

                                        echo "<li><a class='dropdown-item' href='$personal'>Personal</a></li>
                                              <li><a class='dropdown-item' href='$logout'>Logout</a></li>";
                                    }
                                    else
                                    {
                                        echo "<li><a class='dropdown-item' href='$login'> Login </a></li>
                                              <li><a class='dropdown-item' href='$signup'>Signup</a></li>";
                                    }
                                ?>
                        </ul>
                    </div>
                </li>

                <li class="nav-item mb-1 mb-md-0">
                    <div class="dropdown">
                        <a id="nav-Prog-Link" class="nav-link dropdown-toggle <?php
                                if(preg_match("/(Cpp|Algo|.+\/Blog)/", $_SERVER["REQUEST_URI"], $matches))
                                    echo "activeNav";
                            ?>" href="#" data-toggle="dropdown">Programming</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="<?php echo $headerData["Path"]; ?>pages/Cpp/CppTopics.php">C++ PDFs</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo $headerData["Path"]; ?>pages/Blog/OP_OOE.php">Blog</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo $headerData["Path"]; ?>pages/Algo/AlgoTopics.php">Algorithms</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item mb-1 mb-md-0">
                    <div class="dropdown">
                        <a id="nav-Collect-Link" class="nav-link dropdown-toggle <?php
                                if(preg_match("/(Catalog)/", $_SERVER["REQUEST_URI"], $matches))
                                    echo "activeNav";
                            ?>" href="#" data-toggle="dropdown">Collections</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="<?php echo $headerData["Path"]; ?>pages/Catalog/Catalogs.php">Menu</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo $headerData["Path"]; ?>pages/Catalog/MarioWarning.php">Mario Jakks Pacific</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="<?php echo $headerData["Path"]; ?>pages/Catalog/MarioKartCatalog.php">Mario Hot Wheels</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item mb-1 mb-md-0">
                    <a class="text-white nav-link <?php
                            if(preg_match("/(game)/", $_SERVER["REQUEST_URI"], $matches))
                                echo "activeNav";
                        ?>" href="<?php echo $headerData["Path"]; ?>game/connect4.php">Conn4</a>
                </li>

                <li class="nav-item mb-1 mb-md-0">
                    <a id="nav-Sloth-Link" class="nav-link <?php
                            if(preg_match("/(Sloth)/", $_SERVER["REQUEST_URI"], $matches))
                                echo "activeNav";
                        ?>" href="<?php echo $headerData["Path"]; ?>pages/Sloth/Sloth.php">Giant_Sloth</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mb-1 mb-md-0">
                    <div class="dropdown">
                        <a id="nav-Search-Link" class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                            <i class="fas fa-search"></i>
                        </a>
                        <ul class="dropdown-menu nav-right-justified">
                            <li>
                                <form id="search" action="#" class="d-flex" method="GET" >
                                    <input class="form-control" name="search" type="search" placeholder="Search">
                                    <button class="btn text-white" type="submit" aria-label="Search">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div style="position:absolute; top:0; left:0; z-index: 5000;">
    <div style="position:fixed; background-color: black;">
        <p id="dimensions" style="margin:0" class="co-g"></p>
    </div>
</div>
