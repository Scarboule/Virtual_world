<?php
require_once 'session.php';

$req = $bdd->prepare('SELECT * FROM sponso ORDER BY id DESC LIMIT 1');

$req->execute();
$sponso = $req->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/VRW.png">
    <title>Virtual World - Thanks</title>
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
                <a class="active" href="index.php">Home</a>
            </li>
            <li>
                <a href="offers.php">Offers</a>
            </li>
            <li>
                <a href="blog.php">Blog</a>
            </li>
            <li>
                <a <?php if(!isset($_SESSION['user'])){
                    echo 'href="log-in.php"';
                }else{
                    echo 'href="admin.php"';
                }?>>
                    <div id="login-icon">
                        <?php echo $data['pseudo']; ?>
                        <i class="fa fa-user" ></i>
                    </div>
                </a>
            </li>
        </ul>
    </nav>

    <div id="background">
        
        <div id="thanks">
            <h2>
                Your are succesfully subscribed to the beta. <br> Thank you for your support !
            </h2>
            <p>
                Your sponsoring code is :<?php echo $sponso['code'];?>
            </p>
        </div>
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