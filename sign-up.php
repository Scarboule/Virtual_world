<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/VRW.png">
    <title>Virtual World - Sign-up</title>
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

            
            <form class="connect" action="handle_sign-up.php" method="post">
            <?php 
            if(isset($_GET['reg_err']))
            {
                $err = htmlspecialchars($_GET['reg_err']);

                switch($err)
                {
                    case 'success':
                    ?>
                        <div>
                            <strong>Succes</strong> Your account has been created
                        </div>
                    <?php
                    break;

                    case 'password':
                    ?>
                        <div>
                            <strong>Error</strong> password are not matching
                        </div>
                    <?php
                    break;

                    case 'email':
                    ?>
                        <div>
                            <strong>Error</strong> invalid email
                        </div>
                    <?php
                    break;

                    case 'already':
                    ?>
                        <div>
                            <strong>Error</strong> this account already exist
                        </div>
                    <?php 
                }
            }
            ?>
                <h2>Sign-up</h2>       
                <div>
                    <input type="text" name="pseudo" placeholder="Pseudo" required="required">
                </div>
                <div>
                    <input id="thatmail" type="email" name="email" placeholder="Email" required="required">
                </div>
                <div>
                    <input id="pass" type="password" name="password" placeholder="Password" required="required">
                </div>
                <div>
                    <input type="password" name="password_retype" placeholder="Re-enter password" required="required">
                </div>
                <div>
                    <button type="submit">Sign-up</button>
                </div>  
                <p>already have an account ? <a href="log-in.php">Log-in</a></p>
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
    <script src="scripts/verify_input.js"></script>
</body>

</html>