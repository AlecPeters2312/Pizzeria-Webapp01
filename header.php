<header class="flex-center">
    <nav>
        <div class="company-name">
            <a href="index.php">
                <img src="img/epic-slice-logo.png" alt="Epic Slice Logo">
            </a>
            <p class="light-orange">Epic</p>
            <p class="red-color">Slice</p>
            <p class="white-color">Express</p>
        </div>
        <div class="nav-buttons">
            <?php
            session_start();
            if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin') {
                echo '<a class="white-color" href="admin-pagina.php">Admin</a>';
            }
            if (!isset($_SESSION['gebruikersnaam'])) {
                echo '<a class="white-color" href="register-pagina.php">Register</a>';
            }
            if (isset($_SESSION['gebruikersnaam'])) {
                echo '<a class="white-color" href="logout.php">Logout</a>';
            } else {
                echo '<a class="white-color" href="login-pagina.php">Login</a>';
            }
            ?>
            <a class="white-color" href="menu.php">Menu</a>x
            <a class="white-color" href="over-ons.php">Over Ons</a>
            <a href="winkelwagen.php">
                <i class="white-color fa-solid fa-cart-shopping fa-lg"></i>
            </a>
        </div>
    </nav>
</header>