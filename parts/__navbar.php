<?php
if (!isset($page_name)) $page_name = "";
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active <?= $page_name == "data-list" ? "active" : "" ?>">
                    <a class="dropdown-item" href="./data_list.php">訂單</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">

                <a class="nav-link" href="./cart.php"><i class="fas fa-shopping-cart"></i></a>
            </form>
        </div>
    </div>
</nav>