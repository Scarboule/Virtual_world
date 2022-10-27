<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/VRW.png">
    <title>Virtual World - Log-in</title>
</head>

<body>
<?php
    include_once 'menu.php'
    ?>

    <div id="searchbox">
        <input type="text" placeholder="Search Here">
    </div>

    <nav class="anim-nav">
        <div id="logo-img">
            <img src="img/bluetitlelogo.png" alt="mainlogo">
        </div>
        <div id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <ul>
        <li>
                <div id="search-icon">
                    <i class="fas fa-search"></i>
                </div>
            </li>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="offers.php">Offers</a>
            </li>
            <li>
                <a href="blog.php">Blog</a>
            </li>
            <li>
                <a class="active" href="log-in.php">
                    <div id="login-icon">
                        <i class="fa fa-user" ></i>
                    </div>
                </a>
            </li>
        </ul>
    </nav>

    <div id="background1">

        <form class="connect" action="handle_log-in.php" method="post">
        <?php 
            if(isset($_GET['login_err']))
            {
                $err = htmlspecialchars($_GET['login_err']);

                switch($err)
                {
                    case 'success':
                    ?>
                        <div>
                            <strong>Success</strong> Your account has been created
                        </div>
                    <?php
                    break;

                    case 'password':
                    ?>
                        <div>
                            <strong>Error</strong> wrong password
                        </div>
                    <?php
                    break;

                    case 'email':
                    ?>
                        <div>
                            <strong>Error</strong>incorrect email
                        </div>
                    <?php
                    break;

                    case 'already':
                    ?>
                        <div>
                            <strong>Error</strong> account does not exist
                        </div>
                    <?php
                    break;
                }
            }
            ?> 
            <h2>Log-in</h2>       
            <div>
                <input type="email" name="email" placeholder="Email" required="required">
            </div>
            <div>
                <input type="password" name="password" placeholder="Password" required="required">
            </div>
            <div>
                <button type="submit">Log-in</button>
            </div> 
            <p>Don't have an account ? <a href="sign-up.php">Sign-up</a></p>
        </form>
    </div>

    <main>
        
        

        <footer>
        <?php
            include_once 'footer.php'
            ?>
        </footer>

    </main>

    <script src="scripts/main.js"></script>
</body>

</html>