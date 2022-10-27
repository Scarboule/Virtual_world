<?php
require_once 'session.php';
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
    <title>Virtual World - Offers</title>
</head>

<body>
<?php
    include_once 'menu.php'
    ?>

    <div id="searchbox">
        <input type="text" placeholder="Search Here">
    </div>

    <nav id="nav" class="anim-nav">
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
            <a class="active" href="offers.php">Offers</a>
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

    <div id="background1">
        <form id="subscription">
            <h2>Subscribtion</h2>
            <p id="text">
                Get acces to all our games. <br>
                Join the community forum. <br>
                Enjoy the VR experience.
            </p>       
            <div class="option">
                <input type="checkbox" id="checkbox" onclick="myFunction()">
                <label>Rent a VR headset + 16.99$</label>
            </div>
            <div class="option">
                <input type="checkbox" id="checkbox2" onclick="myFunction()">
                <label>Rent VR controllers + 4.99$</label>
            </div>
            <div id="checkout">
                <p id="price">
                    Price : 16.99$/month
                </p>
                <button type="submit">Checkout</button>
            </div>  
            <p>Not connected ? <a href="sign-up.php">Sign-up/Log-in</a></p>
        </form>
    </div>


    <main>
        <div class="genre">
            <div class="simu">
                <img src="img/icone-digital-data.png" alt="simu">
                <h2>Simulation</h2>
                <a>Want to know how it feel to be a pilot, a super hero, or a cat ? You are free to be whatever you want. Choice is yours.</a>
            </div>
            <div class="avent">
                <img src="img/aventureicone.png" alt="avent">
                <h2>aventure</h2>
                <a>A lot of great adventures and skills challenges are waiting for you, in a variety of virtuals immersives worlds. </a>
            </div>
            <div class="commu">
                <img src="img/n_22px-Community_Noun_project_.png" alt="commu">
                <h2>community</h2>
                <a>Play with your friend, familly, or people around the world.Do Coop and share your experience, or try out some competitive games.</a>
            </div>
        </div>

        <div class="separation"></div>
        <h2 id="makefeed">
            Make a feedback
        </h2>
        <div id="feedback_form">
            <form action="handle_feedbacks.php" method="post">
                <div id="comment">
                    <input id="pseudo" type="text" name="pseudo" placeholder="Your pseudo" required="required">

                    <div id="radio">
                        <p>Rating :</p>
                        <input type="radio" name="rating" value="1">
                        <label for="1">1/5</label>
                        <input type="radio" name="rating" value="2">
                        <label for="2">2/5</label>
                        <input type="radio" name="rating" value="3">
                        <label for="3">3/5</label>
                        <input type="radio" name="rating" value="4">
                        <label for="4">4/5</label>
                        <input type="radio" name="rating" value="5" checked="checked">
                        <label for="5">5/5</label>
                    </div>
                    <input id="yourcomment" type="text" name="comment" placeholder="Your comment" required="required">
                    <button type="submit">Post</button>
                </div>
            </form>
        </div>
        <div class="separation"></div>
        <footer>
        <?php
            include_once 'footer.php'
        ?>
        </footer>

    </main>

    <script src="scripts/main.js"></script>
    <script src="scripts/offers_scripts.js"></script>

</body>

</html>